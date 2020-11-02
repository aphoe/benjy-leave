<?php

namespace App\Http\Requests;

use App\Rules\GreaterEndDate;
use App\Rules\LeaveDaysLeft;
use Illuminate\Foundation\Http\FormRequest;

class UserLeaveApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'leave_type_id' => ['required', 'exists:tenant.leave_types,id'],
            'reliever_id' => 'nullable|exists:tenant.users,id',
            'supervisor_id' => 'nullable|exists:tenant.users,id',
            'start' => 'required|date',
            'end' => [
                'required', 'date_format:Y-m-d',
                'after_or_equal:start',
                new LeaveDaysLeft('start', $this->request->get('leave_type_id'))
            ],
            'note' => 'nullable|max:1500'
        ];
    }
}
