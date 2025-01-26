<?php

namespace App\Http\Resources;

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
        "category_name" =>$this->category_name,
        "category_short_detail" =>$this->category_short_detail,
        "parent_category_id" =>$this->parent_category_id,
        "status" =>$this->status,
        #"added_by" => $this->added_by,
        "added_by" => $this->whenNotNull($this->user->name),

       ];
    }
}
