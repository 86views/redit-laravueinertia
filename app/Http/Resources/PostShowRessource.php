<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostShowRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'username' => $this->user->username,
            'slug' => $this->slug,
            'url' => $this->url,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'owner' => auth()->id() ==  $this->user_id ? true : false,
            'created_at' => $this->created_at->diffForHumans(),
            'postVotes' => $this->whenLoaded('postVotes'),
           
            
        ];
    }
}
