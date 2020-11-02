<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackButton extends Component
{
    /**
     * @var string
     */
    public $caption;
    /**
     * @var string
     */
    public $type;
    /**
     * @var string
     */
    public $class;
    /**
     * @var string
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param string $caption
     * @param string $type
     * @param string $class
     * @param string $icon
     */
    public function __construct(string $caption, string $icon='far fa-save', string $type='submit', string $class='bqhr btn-submit')
    {
        $this->caption = $caption;
        $this->type = $type;
        $this->class = $class;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.back-button');
    }
}
