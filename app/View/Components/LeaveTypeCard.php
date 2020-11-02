<?php

namespace App\View\Components;

use App\Customers\Models\LeaveType;
use Illuminate\View\Component;

class LeaveTypeCard extends Component
{
    /**
     * @var LeaveType
     */
    public $leaveType;

    /**
     * Create a new component instance.
     *
     * @param LeaveType $leaveType
     */
    public function __construct(LeaveType $leaveType)
    {
        $this->leaveType = $leaveType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.leave-type-card');
    }
}
