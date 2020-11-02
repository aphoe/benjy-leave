<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalRow extends Component
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
     * Create a new component instance.
     *
     * @param string $caption
     * @param string $id
     */
    public function __construct(string $caption, string $id)
    {
        //
        $this->caption = $caption;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-row');
    }
}
