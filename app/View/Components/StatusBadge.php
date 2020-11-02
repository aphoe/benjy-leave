<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusBadge extends Component
{
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
    public $element;
    /**
     * @var string
     */
    public $caption;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $icon
     * @param string $caption
     * @param string $element
     */
    public function __construct(string $type, string $icon, string $caption, string $element='span')
    {
        $this->type = $type;
        $this->icon = $icon;
        $this->element = $element;
        $this->caption = $caption;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.status-badge');
    }
}
