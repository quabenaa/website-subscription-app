<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\PostRequest;
use App\Models\Post;

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
