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
            'likesAndDislikes' => $this->likesAndDislikes,
            'created_at' => $this->created_at->format('H:i Y/m/d'),
            'created_by' => $this->created_by,
        ]);
    }

    public function with($request) 
    {
        return [
            'version'    => '1.0.1',
            'author_github' => 'https://github.com/MrGrey17/',
            'author_instagram' => 'https://instagram.com/sergii_kirnosov/',
            'author_telegram' => 'https://t.me/MrGrey17/'
        ];
    }
}
