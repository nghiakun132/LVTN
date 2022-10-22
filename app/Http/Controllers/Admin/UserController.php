<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getWithRelationship([
            'order',
            'address',
        ]);

        $data = ['users' => $users];

        return view('admin.user.index', $data);
    }

    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $data = [
            'user' => $user,
        ];
        return view('admin.user.show', $data);
    }

    public function active(Request $request)
    {
        try {
            $user = $this->userRepository->findById($request->id);
            $user->status = !$user->status;
            $user->save();
            return response()->json([
                'success' => true,
                'code' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
