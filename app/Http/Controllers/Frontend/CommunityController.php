<?php

namespace App\Http\Controllers\FrontEnd;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Http\Resources\CommunityResource;

class CommunityController extends Controller
{
    public function show($slug)
    {

        $community = Community::where('slug', $slug)->firstOrFail();

        $posts = CommunityPostResource::collection($community->posts()->with(['user', 'postVotes' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->withCount('comments')->paginate(3));
        // $posts = $community->posts()->paginate(10)->through(fn ($post) => [
        //     'id' => $post->id,
        //     'title' => $post->name,
        //     'description' => $post->description,
        //     'username' => $post->user->username,
        //     'slug' => $post->slug,
        // ]);

        $communities =  CommunityResource::collection(Community::withCount('posts')->latest()->take(4)->get());
        return Inertia::render('Frontend/Communities/Show', compact('community', 'posts', 'communities'));
    }
}
