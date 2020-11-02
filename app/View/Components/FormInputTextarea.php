<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInputTextarea extends Component
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
     * @var int
     */
    public $rows;
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
     * @param int $rows
     * @param bool $required
     */
    public function __construct(string $caption, string $id, string $placeholder, int $rows=5, bool $required=true)
    {
        $this->caption = $caption;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input-textarea');
    }
}
