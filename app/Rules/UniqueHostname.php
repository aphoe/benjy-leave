<?php

namespace App\Rules;

use Hyn\Tenancy\Models\Hostname;
use Illuminate\Contracts\Validation\Rule;

class UniqueHostname implements Rule
{
    private $subDomain;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->subDomain = subDomainFqdn($value);
        //dd($this->subDomain);
        if(Hostname::where('fqdn', $this->subDomain)->exists()){
            return false;
        }else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute is already in use by another customer.';
    }
}
