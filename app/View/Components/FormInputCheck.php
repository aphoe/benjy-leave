<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInputCheck extends Component
{
    /**
     * @var string
     */
    public $caption;
    /**
     * @var string
     */
    public $id;
    /**
     * @var bool
     */
    public $required;

    /**
     * Create a new component instance.
     *
     * @param string $caption
     * @param string $id
     * @param bool $required
     */
    public function __construct(string $caption, string $id, bool $required=true)
    {
        $this->caption = $caption;
        $this->id = $id;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input-check');
    }
}
