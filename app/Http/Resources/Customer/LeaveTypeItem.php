<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaveTypeItem extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'has_leave_note' => $this->has_leave_note,
            'has_return_note' => $this->has_return_note,
            'has_report' => $this->has_report,
            'leave_note' => $this->leave_note_text,
            'return_note' => $this->return_note_text,
            'report' => $this->report_text,
        ];
    }
}
