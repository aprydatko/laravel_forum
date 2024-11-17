<?php

namespace App\Http\Resources\Branch;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionWithBranchesResource extends JsonResource
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
            'branches' => BranchResource::collection($this->branches)->resolve()
        ];
    }
}
