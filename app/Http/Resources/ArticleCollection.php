<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return with(parent::toArray($request));
    }
    // TODO: maybe the data can be taken from App \ Http \ Resources \ Article, but I don't know how to do it 
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
