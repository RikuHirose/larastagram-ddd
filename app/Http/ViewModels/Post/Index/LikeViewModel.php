<?php

namespace App\Http\ViewModels\Post\Index;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeViewModel extends JsonResource
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
            'user_id'  => $this->user_id,
            'post_id'  => $this->post_id,
        ];
    }
}
