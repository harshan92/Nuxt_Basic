<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;

use App\Http\Requests\TopicCreateRequest;

use App\Http\Resources\Topic as TopicResource;

class TopicController extends Controller
{
    public function index()
    {
        $topic=Topic::latestFirst()->paginate(5);
        return TopicResource::collection($topic);
    }
    public function store(TopicCreateRequest $request)
    {
        $topic=new Topic;
        $topic->title=$request->title;
        $topic->user()->associate($request->user());

        $post=new Post;
        $post->body=$request->body;
        $post->user()->associate($request->user());

        $topic->save();
        $topic->posts()->save($post);

        return new TopicResource($topic);
    }
}
