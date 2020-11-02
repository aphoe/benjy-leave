<?php
namespace App\Repositories;

use App\Customers\Models\Leave;
use App\Customers\Models\LeaveNote;
use Illuminate\Http\Request;

class LeaveNoteRepository
{
    public function create(Leave $leave, string $file_name, Request $request): LeaveNote
    {
        $note = new  LeaveNote();
        $note->leave_id = $leave->id;
        $note->type = $request->type;
        $note->note = $file_name;
        $note->save();

        return $note;
    }
}
