<?php

namespace App\Http\Controllers\Backend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityResource;
use App\Http\Requests\ComunityStoreRequest;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $communities = CommunityResource::collection(Community::all());

        // return Inertia::render('Communities/Index', compact('communities'));

        $communities= Community::where('user_id', auth()->id())->paginate(10)->through(fn ($community) => [
            'id' => $community->id,
            'name' => $community->name,
            'description' => $community->description,
            'slug' => $community->slug,
        ]);
        return Inertia::render('Communities/Index', compact('communities'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return Inertia::render('Communities/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComunityStoreRequest $request)
    {
        Community::create($request->validated() + ['user_id' => auth()->user()->id]);

        return redirect()->route('communities.index')
        ->with('message', 'Community created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        return inertia('Communities/Edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComunityStoreRequest $request, Community $community)
    {
        
        $community->update($request->validated());
 
         return redirect()->route('communities.index')
             ->with('message', 'Comunity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        $community->delete();
 
        return redirect()->route('communities.index')
            ->with('message', 'Community deleted successfully');
    }
}
