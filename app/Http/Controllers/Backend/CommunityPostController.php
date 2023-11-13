<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Redirect;

class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Community $community)
    {
        return Inertia::render('Communities/Posts/Create', compact('community'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, Community $community)
    {
         $community->posts()->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
         ]); 

        //  $community->auth()->user()->posts()->create([
        //     'title' => $request->title,
        //     'url' => $request->url,
        //     'description' => $request->description,

        //  ]);

        //return Redirect::route('frontend.communities.show', $community->slug);
        return redirect()->route('frontend.communities.show', $community->slug)
        ->with('message', 'Post Created For' . ' '.  $community->slug. ' '. 'Community');
       
    }

    /**o
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community, Post $post)
    
    {
        $this->authorize('update', $post);
        return Inertia::render('Communities/Posts/Edit', compact('community', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Community $community, Post $post)
    {

        $this->authorize('update', $post);
         $post->update($request->validated());

         return redirect()->route('frontend.communities.show', $community->slug)
                 ->with('message', 'Post Updated For' . ' '.  $community->slug. ' '.  $post->slug . ' '.  'Community');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community, Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('frontend.communities.show', $community->slug)
        ->with('message', 'Post Delete Succesfully for' . ' '.  $community->slug. ' '. 'Community');
    }
}
