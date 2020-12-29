<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;

use App\Http\Requests\TopicCreateRequest;
use App\Http\Requests\TopicUpdateRequest;

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

    public function show(Topic $topic)
    {
        return new TopicResource($topic);
    }

    public function update(TopicUpdateRequest $request, Topic $topic)
    {
        $this->authorize("update", $topic);
        $topic->title= $request->get('title', $topic->title);
        $topic->save();
        return new TopicResource($topic);
    }
}
