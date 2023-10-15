<?php

namespace App\Http\Controllers\Backend;

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
