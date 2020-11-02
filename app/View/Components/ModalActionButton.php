<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalActionButton extends Component
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
    public $icon;
    /**
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param string $caption
     * @param string $id
     * @param string $icon
     * @param string $type
     */
    public function __construct(string $caption, string $id, string $icon, string $type='button')
    {
        $this->caption = $caption;
        $this->id = $id;
        $this->icon = $icon;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-action-button');
    }
}
