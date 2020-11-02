<?php
namespace App\Traits;

trait ModelCountry {
    /**
     * Country name accessor
     * @return mixed
     */
    public function getCountryNameAttribute(){
        if($this->country === null){
            return '';
        }
        return countryField($this->country);
    }

    /**
     * State name accessor
     * @return string
     */
    public function getStateNameAttribute(){
        if($this->country === null || $this->state === null){
            return '';
        }
        return countryState($this->country, $this->state);
    }

    public function getLocationAttribute(){
        if($this->city === null && $this->state !== null && $this->country !== null){
            return $this->state_name . ', ' . $this->country_name;
        }else if($this->country === null || $this->state === null || $this->city === null){
            return '';
        }
        return $this->city . ', ' . $this->state_name . ', ' . $this->country_name;
    }
}
