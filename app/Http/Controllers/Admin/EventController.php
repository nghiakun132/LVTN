<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event_details;
use App\Repositories\EventRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    protected $eventRepository;
    protected $productRepository;
    public function __construct(
        EventRepository $eventRepository,
        ProductRepository $productRepository
    ) {
        $this->eventRepository = $eventRepository;
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $events = $this->eventRepository->getWithRelationship(
            []
        );
        return view('admin.event.index', compact('events'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->eventRepository->create($data);
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function show($id)
    {
        $products = $this->productRepository->getAll();
        $event = $this->eventRepository->getFirstWithRelationship([
            'event_details' => function ($query) {
                $query->with([
                    'products' => function ($query) {
                        $query->withTrashed();
                    }
                ]);
            }
        ], $id);
        $data = [
            'products' => $products,
            'event' => $event,
        ];

        return view('admin.event.show', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'percentage' => 'required',
        ], [
            'product_id.required' => 'Vui lòng chọn sản phẩm',
            'percentage.required' => 'Vui lòng nhập phần trăm giảm giá',
        ]);

        $data = $request->all();
        try {
            DB::beginTransaction();
            $products = Event_details::where('product_id', $data['product_id'])->where('event_id', $id)->first();
            if ($products) {
                $products->update([
                    // 'quantity' => $data['quantity'],
                    'percentage' => $data['percentage'],
                ]);
                $product = $this->productRepository->findOne($data['product_id']);
                $product->pro_sale = $data['percentage'];
                $product->save();
            } else {
                $eventDetails = new Event_details();
                $eventDetails->product_id = $data['product_id'];
                $eventDetails->event_id = $id;
                // $eventDetails->quantity = $data['quantity'];
                $eventDetails->percentage = $data['percentage'];
                $eventDetails->save();

                $product = $this->productRepository->findOne($data['product_id']);
                $product->pro_sale = $data['percentage'];
                $product->save();
            }


            DB::commit();
            return redirect()->back()->with('success', 'Thêm mới thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

    public function deleteDetail()
    {
        if (request()->ajax()) {
            $id = request()->id;
            $eventDetail = Event_details::find($id)->delete();
            if (!$eventDetail) {
                return response()->json([
                    'code' => 500,
                    'message' => 'Xóa thất bại'
                ], 500);
            }
            return response()->json([
                'code' => 200,
                'message' => 'Xóa thành công'
            ], 200);
        }
    }
}
