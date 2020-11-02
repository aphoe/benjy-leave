<?php

if(!function_exists('countriesSelectArray')){
    /**
     * All countries as an HTML form select option array
     * @return array
     */
    function countriesSelectArray(): array
    {
        $countries = countries();
        $selectArray = [];

        foreach ($countries as $key=>$country){
            $selectArray[$country['iso_3166_1_alpha2']] = $country['name'];
        }

        asort($selectArray);

        return $selectArray;
    }
}
if(!function_exists('countryStates')){
    /**
     * States of a country
     * @param string $code
     * @return array
     */
    function countryStates(string $code)
    {
        $country = country($code);
        $states = $country->getDivisions();
        $statesArray = [];

        //Some countries don't have states
        if($states === null){
            return [$code => $country->getName()];
        }

        //Process states
        foreach ($states as $key=>$state){
            $statesArray[$key] = $state['name'];
        }

        asort($statesArray);

        return $statesArray;
    }
}
if(!function_exists('countryField')){
    /**
     * Get a field from country
     * @param string $code
     * @param string $field
     * @return mixed
     */
    function countryField(string $code, string $field='name.common'){
        $country = country($code);
        return $country->get($field);
    }
}
if(!function_exists('countryState')){
    /**
     * Get the name of a state
     * @param string $countryCode
     * @param string $stateCode
     * @return string
     */
    function countryState(string $countryCode, string $stateCode): string
    {
        $stateCode = strtoupper($stateCode);
        $country = country($countryCode);
        $state = $country->getDivision($stateCode);
        return $state['name'];
    }
}
