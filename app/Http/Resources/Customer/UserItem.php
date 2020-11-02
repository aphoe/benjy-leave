<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class UserItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'first_name' => $this->first_name,
            'other_name' => $this->other_name,
            'name' => $this->name,
            'official_name' => $this->official_name,
            'slug' => $this->slug,
            'photo' => $this->photo,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at->format('j M, Y - g:ia'),
            'blocked' => $this->blocked,
            'last_online_at' => $this->last_online_at->format('j M, Y - g:ia'),
        ];
    }
}
