<?php

namespace App\Http\Controllers;

use App\Events\PostAdded;
use App\Http\Requests\Post\StoreRequest;
use App\Services\PostService;
use App\UseCases\Post\IndexAction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index(Request $request, IndexAction $action)
    {
        return $action($request->id);
    }

    public function create(StoreRequest $request, PostService $postService)
    {
        try {
            event(new PostAdded('k---'));
            event(new PostAdded('i---'));
            event(new PostAdded('t---'));
            event(new PostAdded('a---'));
            event(new PostAdded('---'));
            return response()->json([
                'result' => 'success',
            ]);

            $post = $postService->createNewPost($request->content);
            
            event(new PostAdded($post->content));

            return response()->json([
                'result' => 'success',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'result' => 'error',
            ]);
        }
    }
}
