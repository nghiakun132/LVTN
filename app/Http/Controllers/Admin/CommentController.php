<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $comments = $this->commentRepository->getWithRelationship([
            'user',
            'product',
        ]);
        $data = [
            'comments' => $comments,
        ];
        return view('admin.comment.index', $data);
    }

    public function confirm($id)
    {
        $comment = $this->commentRepository->findById($id);
        $comment->status = 1;
        $comment->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $comment = $this->commentRepository->findById($id);
        $comment->delete();
        return redirect()->back();
    }

    public function confirmAll(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            foreach ($id as $item) {
                $comment = $this->commentRepository->findById($item);
                $comment->status = 1;
                $comment->save();
            }
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        }
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            foreach ($id as $item) {
                $comment = $this->commentRepository->findById($item);
                $comment->delete();
            }
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        }
    }
}
