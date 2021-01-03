<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Like;

class PostLikeController extends Controller
{
    public function store(Request $request, Topic $topic, Post $post)
    {
        $this->authorize("like",$post);
        $like=new Like;
        $like->user()->associate($request->user());
        $post->likes()->save($like);
        return response(null, 204);
    }
}
