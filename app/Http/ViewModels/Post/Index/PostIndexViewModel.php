<?php

namespace App\Http\ViewModels\Post\Index;

use App\Like;
use Illuminate\Http\Resources\Json\JsonResource;

class PostIndexViewModel extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'img_url'     => $this->img_url,
            'description' => $this->description,
            // FIXME
            'like_id'     => Like::buildQueryByUserIdAndPostId(\Auth::user()->id, $this->id)->pluck('id'),
            'is_like'     => Like::buildQueryByUserIdAndPostId(\Auth::user()->id, $this->id)->exists(),
            'user'        => new UserViewModel($this->user),
            'likes'       => LikeViewModel::collection($this->likes),
            'comments'    => CommentViewModel::collection($this->comments),
        ];
    }
}
