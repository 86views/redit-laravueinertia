<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommunityPostResource extends JsonResource
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
            'username' => $this->user->username,
            'description' => substr($this->description, 0, 50) . '...',
            'slug' => substr($this->slug, 0, 10) . '...',
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->created_at->toDateString()
         ];
    }
}
