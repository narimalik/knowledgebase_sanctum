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
            "id"=>$this->id,
            "article_title"=>$this->article_title,
            "article_title"=>$this->article_title,
            "article_sub_title"=>$this->article_sub_title,
         //"detail"=> $this->whenNotNull($this->detail),  # Only return value if its not null
            "detail"=> $this->whenNotNull($this->detail),
            "categories"=> $this->categories, // To retur relationship data just call model relationship function.
           //"added_by"=>$this->added_by,
             "added_by"=>$this->user->name,
            //"categories"=> CategoryResource::collection($this->categories),
             "comments"=> $this->comments,
            // "comments"=> CommentResource::collection($this->comments) ,
           
        ];
    }
}
