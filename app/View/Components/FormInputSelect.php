<?php

namespace App\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class FormInputSelect extends Component
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
     * @var Collection
     */
    public $options;
    /**
     * @var string
     */
    public $placeholder;
    /**
     * @var bool
     */
    public $required;

    /**
     * Create a new component instance.
     *
     * @param string $caption
     * @param string $id
     * @param Collection $options
     * @param string $placeholder
     * @param bool $required
     */
    public function __construct(string $caption, string $id, Collection $options, string $placeholder, bool $required=true)
    {
        $this->caption = $caption;
        $this->id = $id;
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input-select');
    }
}
