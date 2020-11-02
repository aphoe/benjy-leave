<?php

namespace App\Http\Requests;

use App\Enums\LeaveNoteType;
use App\Services\LeaveNoteService;
use Illuminate\Foundation\Http\FormRequest;

class UserLeaveNoteRequest extends FormRequest
{
    /**
     * @var LeaveNoteService
     */
    private $leaveNoteService;

    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
        $this->leaveNoteService = new LeaveNoteService();
    }

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
            'leave_id' => 'required',
            'type' => 'required|in:' . implode(',', LeaveNoteType::getValues()),
            'note' => 'required|mimes:' . $this->leaveNoteService->noteExts(),
        ];
    }
}
