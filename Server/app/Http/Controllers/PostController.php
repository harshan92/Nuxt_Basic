<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;

use App\Http\Requests\StorePostRequest;

use App\Http\Resources\Post as PostResource;
class PostController extends Controller
{
    public function store(StorePostRequest $request, Topic $topic)
    {
        $post=new Post;
        $post->body=$request->body;
        $post->user()->associate($request->user());

        $topic->posts()->save($post);
        return new PostResource($post);
    }
}
