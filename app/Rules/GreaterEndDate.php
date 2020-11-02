<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class GreaterEndDate implements Rule
{
    private $start;
    private $end;
    private $msg;

    /**
     * Create a new rule instance.
     *
     * @param $start
     */
    public function __construct($start)
    {
        try {
            $this->start = Carbon::createFromFormat('Y-m-d', request()->get($start));
        }catch (\Exception $exception){
            $this->start = null;
        }
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
        $this->end = Carbon::createFromFormat('Y-m-d', $value);
        if($this->start === null){
            $this->msg = 'Start date missing';
            return false;
        }elseif($this->end->lt($this->start)){
            $this->msg = $this->end->format('j F, Y') . ' is less than ' . $this->start->format('j F, Y');
            return false;
        }else{
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
        return $this->msg;
    }
}
