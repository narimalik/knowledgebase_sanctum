<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /// return parent::toArray($request);
        return [
            'name'=>$this->name,
            'date'=>$this->created_at,
            'articles'=> ArticleResource::collection($this->articles) ,
            //'articles'=> $this->articles ,
        ];
    }
}
