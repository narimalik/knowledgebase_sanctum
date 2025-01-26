<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "comments_detail" => $this->comments_detail,
            "article_id" => $this->article_id,
            "article" => $this->article->article_title,
            "added_by" => $this->user->name,
            #CommentResource::collection(Comment::all());
            #"article"=>ArticleResource::collection($this->article->get()),
            
            


            #"user_added"=>
            
         
        ];
    }
}
