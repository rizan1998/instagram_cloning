<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // default return parent::toArray($request);
        // custom
        return [
            'id' => $this->id,
            'image' => $this->image,
            'caption' => $this->caption,
            'user' => $this->user,
            'likes_count' => $this->likes_count,
            'like_status' => $this->is_liked() ? 'unlike' : 'like',
            'created_at' => $this->created_at->diffForHumans(),
            'post_time' => strtotime($this->created_at)
        ];
    }
}
