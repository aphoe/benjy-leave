<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInputRadioForm extends Component
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
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $caption
     * @param string $id
     * @param string $name
     * @param string $value
     */
    public function __construct(string $caption, string $id, string $name, string $value)
    {
        //
        $this->caption = $caption;
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input-radio-form');
    }
}
