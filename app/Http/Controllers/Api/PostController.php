<?php

namespace App\Http\Controllers\Api;

use App\Events\PostCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use function event;
use function response;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());
        event(new PostCreated($post));

        return response()->json($post, 201);
    }
}
