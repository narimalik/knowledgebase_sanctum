<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "article_title"=>$this->article_title,
            "article_sub_title"=>$this->article_sub_title,
            "categories"=> $this->categories,
        ];
    }
}
