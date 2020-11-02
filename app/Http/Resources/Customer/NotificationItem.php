<?php

namespace App\Http\Resources\Customer;

use App\Enums\NotificationType;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'url' => $this->url,
            'bgClass' => $this->bg_class,
            'type' => strtolower(NotificationType::getKey((integer) $this->type)),
            'infoClass' => $this->info_class,
            'user' => [
                'name' => $this->sender->name,
                'photoAvatar' => userPhoto($this->sender->photo),
                'photoLarge' => userPhoto($this->sender->photo, 'large'),
            ],
            'detail' => $this->detail,
            'msg' => $this->message,
            'time' => $this->created_at->diffForHumans(),
        ];
    }
}
