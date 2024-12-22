<?php

namespace App\Http\Resources\Theme;

use App\Http\Resources\Message\MessageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ThemeWithMessageResource extends JsonResource
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
            'description' => $this->description,
            'branch_id' => $this->branch_id,
            'messages' => MessageResource::collection($this->messages)->resolve(),
        ];
    }
}
