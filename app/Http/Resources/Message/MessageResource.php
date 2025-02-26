<?php

namespace App\Http\Resources\Message;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'content' => $this->content,
            'theme_id' => $this->theme_id,
            'is_liked' => $this->isLiked,
            'likes' => $this->liked_users_count,
            'is_not_solved_complaint' => $this->is_not_solved_complaint,
            'user' => UserResource::make($this->user)->resolve(),
            'time' => $this->created_at->format('d-m-Y'),
        ];
    }
}
