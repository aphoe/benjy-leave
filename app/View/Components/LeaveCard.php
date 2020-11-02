<?php

namespace App\View\Components;

use App\Customers\Models\Leave;
use App\Enums\LeaveStatus;
use App\Traits\LeaveComponent;
use Illuminate\View\Component;

class LeaveCard extends Component
{
    use LeaveComponent;

    /**
     * @var Leave
     */
    public $leave;
    /**
     * @var string
     */
    public $type;
    /**
     * @var string
     */
    public $icon;
    /**
     * @var string
     */
    public $caption;
    /**
     * @var string
     */
    public $tag;
    /**
     * @var string
     */
    public $menu;

    /**
     * Create a new component instance.
     *
     * @param Leave $leave
     * @param string $menu
     * @param string $tag
     */
    public function __construct(Leave $leave, string $menu='user', string $tag='leave')
    {
        $this->leave = $leave;
        $this->init($this->leave->status);
        $this->tag = $tag;
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.leave-card');
    }
}
