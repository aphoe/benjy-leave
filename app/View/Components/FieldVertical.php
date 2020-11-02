<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FieldVertical extends Component
{
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    public $value;
    /**
     * @var string|null
     */
    public $color;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $value
     * @param string $color
     */
    public function __construct(string $label, string $value, string $color=null)
    {
        $this->label = $label;
        $this->value = $value;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.field-vertical');
    }
}
