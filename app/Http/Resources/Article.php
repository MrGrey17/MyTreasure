<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return with([
            'id'    => $this->id, 
            'title' => $this->title,
            'description'  => $this->description,
            'image' => $this->image,
            'views' => $this->views,
            'likesAndDislikes' => $this->likesAndDislikes
        ]);
    }

    public function with($request) 
    {
        return [
            'version'    => '1.0.0',
            'author_github' => 'https://github.com/MrKrist16/',
            'author_instagram' => 'https://instagram.com/sergii_kirnosov/',
            'author_telegram' => 'https://t.me/MrKrist16/'
        ];
    }
}
