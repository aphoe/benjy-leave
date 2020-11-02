<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInputRadio extends Component
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
     * @var bool
     */
    public $checked;
    /**
     * @var bool
     */
    public $disabled;
    /**
     * @var string|null
     */
    public $class;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $caption
     * @param string $id
     * @param string $name
     * @param $value
     * @param bool $checked
     * @param bool $disabled
     * @param string|null $class
     */
    public function __construct(string $caption, string $id, string $name, $value, bool $checked=false, bool $disabled=false, string $class=null)
    {
        $this->caption = $caption;
        $this->id = $id;
        $this->name = $name;
        $this->checked = $checked;
        $this->disabled = $disabled;
        $this->class = $class;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input-radio');
    }
}
