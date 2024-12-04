<?php

namespace App\Http\Resources\Branch;

use App\Http\Resources\Theme\ThemeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchWithChildrenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'section_id' => $this->section_id,
            'parent_id' => $this->parent_id,
            'children' => BranchResource::collection($this->children)->resolve(),
            'themes' => ThemeResource::collection($this->themes)->resolve(),
        ];
    }
}
