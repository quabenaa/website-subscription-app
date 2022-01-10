<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/posts', function (Request $request) {

    $post = \App\Models\Post::create($request->all());

    event(new \App\Events\PostCreated($post));

    return json_encode(['id' => $post->id,
        'title' => $post->title,
        'description' => $post->description,
        'body' => $post->body,
        'website_id' => $post->website_id]);
});


Route::post('/websites/subscriptions', function (Request $request) {

    $subscription = \App\Models\WebsiteSubscription::create($request->all());

    return json_encode(
        [
            'message' => 'User has successfully subscribe to '.$subscription->website->name,
            'payload' =>
                [
                    'user_id' => $subscription->user_id,
                    'website_id' => $subscription->website_id
                ]
        ]);
});
