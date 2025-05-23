<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       # return parent::toArray($request);
       
       return [
        "id" =>$this->id,
        "category_name" =>$this->category_name,
        "category_short_detail" =>$this->category_short_detail,
        "parent_category_id" =>$this->parent_category_id,
        "articles" => SingleArticleResource::collection($this->articles),
        "status" =>$this->status,
       # "added_by" => $this->added_by,
        "added_by" => $this->whenNotNull($this->user),
       ];
    }
}
