<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerformanceLeaveSettingRequest extends FormRequest
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
            'leave_type_id' => 'required|exists:tenant.leave_types,id',
            'year' => ruleYear(),
            'days' => 'nullable|integer|max:366',
            'shortest_notice' => 'nullable|integer|min:0|max:366',
            'submission_deadline' => 'nullable|date',
            'start' => 'nullable|date',
            'end' => 'nullable|date|after_or_equal:start',
        ];
    }
}
