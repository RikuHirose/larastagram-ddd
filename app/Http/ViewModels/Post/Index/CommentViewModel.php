<?php

namespace App\Http\ViewModels\Post\Index;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentViewModel extends JsonResource
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
            'description'  => $this->description,
        ];
    }
}
