<?php


namespace App\Traits;


trait ModelStatus
{
    /**
     * Show active status as a Yes/No string
     * @return string
     */
    public function getStatusTextAttribute(){
        return $this->active ? 'Yes' : 'No';
    }
}
