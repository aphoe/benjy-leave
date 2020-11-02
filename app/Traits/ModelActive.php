<?php
namespace App\Traits;

trait ModelActive {

    /**
     * Show active status as a Yes/No string
     * @return string
     */
    public function getActiveStatusAttribute(){
        return $this->active ? 'Yes' : 'No';
    }
}
