<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class PostsResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            // 'image' => new ImagesResource($this->images),
            'rate' => $this->rate,
            'user' => new UsersResource($this->users),
            'category' => new CategoriesResource($this->categories),
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at->toFormattedDateString(),
        ];
    }
}
