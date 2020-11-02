<?php
namespace App\Services;

use App\Classes\CustomerHandler;
use App\Customers\Models\Leave;
use App\Customers\Models\LeaveNote;
use App\Enums\LeaveNoteType;

class LeaveNoteService
{
    /**
     * @var CustomerHandler
     */
    private $customerHandler;

    public function __construct()
    {
        $this->customerHandler = new CustomerHandler();
    }

    /**
     * Permitted extensions for note file
     * @return string
     */
    public function noteExts(): string
    {
        return 'pdf,xls,xlsx,doc,docx,odf,rtf';
    }

    /**
     * Upload note file and return name
     * @param Leave $leave
     * @param int $type
     * @param string $field
     * @return string
     */
    public function upload(Leave $leave, int $type, string $field='note'): string
    {
        $file = request()->file($field);
        $ext = $file->getClientOriginalExtension();

        $fileName = $this->fileName($leave, $type, $ext);
        $path = $this->customerHandler->publicPath(CustomerHandler::LEAVE_NOTE);
        $file->move($path, $fileName);

        return $fileName;
    }

    /**
     * Generate name for note
     * @param Leave $leave
     * @param int $type
     * @param $ext
     * @return string
     */
    public function fileName(Leave $leave, int $type, $ext):  string
    {
        $name = LeaveNoteType::getDescription($type) . '_' . hashEncode($leave->id);
        return str_slug(strtolower($name)) . '.' . $ext;
    }

    /**
     * Check if leave has duplicate for note type
     * @param Leave $leave
     * @param int $type
     * @param bool $redirect
     * @return bool|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkDuplicate(Leave $leave, int $type, bool $redirect=true)
    {
        $count = $leave->leaveNote()
            ->where('type', $type)
            ->count();
        if($count > 0){
            if($redirect) {
                return redirect('user/leave/' . hashEncode($leave->id) . '/note')->with('theme-warning', 'You can only have one ' . LeaveNoteType::getDescription($type) . ' note per leave');
            }

            return true;
        }

        if(!$redirect){
            return false;
        }
    }
}
