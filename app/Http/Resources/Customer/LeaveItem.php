<?php

namespace App\Http\Resources\Customer;

use App\Customers\Models\LeaveType;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaveItem extends JsonResource
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
            'leave_type' => new LeaveTypeItem($this->leaveType),
            'user' => new UserItem($this->user),
            'supervisor' => new UserItem($this->supervisor),
            'hr' => new UserItem($this->hr),
            'reliever' => new UserItem($this->reliever),
            'start' => $this->start->format('j M, Y'),
            'end' => $this->end->format('j M, Y'),
            'extension' => $this->extension ? $this->extension->format('j M, Y') : null,
            'supervisor_status' => $this->supervisor_status,
            'reliever_status' => $this->reliever_status,
            'status' => $this->status,
            'supervisor_status_text' => $this->statusText('supervisor_status'),
            'reliever_status_text' => $this->statusText('reliever_status'),
            'status_text' => $this->statusText('status'),
            'taken' => $this->taken,
            'taken_text' => $this->taken_text,
            'note' => $this->note,
            'note_display' => $this->note_display,
        ];
    }
}
