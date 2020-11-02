<?php


namespace App\Traits;


use Illuminate\Support\Carbon;

trait DateFormat
{
    /**
     * Format a date string
     * @param string $field
     * @param string $format
     * @param bool $has_time
     * @return string
     */
    public function format(string $field, string $format='short', bool $has_time = false): string
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes[$field]);
        return $date->format($this->formatString($format, $has_time));
    }

    /**
     * Compose format string
     * @param string $format
     * @param bool $has_time
     * @return String
     */
    private function formatString(string $format, bool $has_time): String
    {
        $code = '';

        switch($format){
            case 'short':
                $code = 'j M, Y';
                break;
            case 'mid':
                $code = 'jS M, Y';
                break;
            case 'long':
                $code = 'jS F, Y';
                break;
            default:
                return 'j M, Y';
        }

        if($has_time){
            $code .= ' g:ia';
        }

        return $code;
    }
}
