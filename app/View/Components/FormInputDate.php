<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInputDate extends Component
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
    public $placeholder;
    /**
     * @var string
     */
    public $info;
    /**
     * @var bool
     */
    public $required;

    /**
     * Create a new component instance.
     *
     * @param string $caption
     * @param string $id
     * @param string $placeholder
     * @param bool $required
     * @param string $info
     */
    public function __construct(string $caption, string $id, string $placeholder, bool $required=true, string $info='')
    {
        //
        $this->caption = $caption;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->info = $info;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input-date');
    }
}
