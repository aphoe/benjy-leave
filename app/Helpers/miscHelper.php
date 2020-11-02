<?php

use App\Customers\Models\User;
use Illuminate\Support\Collection;

if(!function_exists('uniqueCustomerSlug')){
    /**
     * Get a unique slug for a model
     * @param string $name
     * @param string $table
     * @return string
     */
    function uniqueCustomerSlug(string $name, string $table): string{
        $slug = str_slug($name);
        $whileSlug = $slug;
        switch($table) {
            case 'users':
                $eloquent = User::where('slug', $slug);
                //$eloquent = DB::setDatabaseName('bqhr_1587376014_4a4ab155c4f6')->connection('tenant')->table('users')->where('slug', $slug);
                break;

            default:
                return false;
        }
        $sn = 1;
        while($eloquent->count() > 0){
            $whileSlug = $slug . '-' . $sn++;

            switch($table) {
                case 'users':
                    $eloquent = User::where('slug', $whileSlug);
                    break;

                default:
                    return false;
            }
        }

        return $whileSlug;
    }
}
if(!function_exists('phoneRequestRule')){
    /**
     * Return rule for phone field request
     * @param bool $required
     * @return string
     */
    function phoneRequestRule(bool $required = true): string
    {
        $rule = $required ? 'required' : 'nullable';
        return $rule . '|between:6,15|starts_with:+,009';
    }
}
if(!function_exists('implodeAnd')){
    /**
     * Implode arrays into sentence
     * @param array $haystack
     * @param string $glue
     * @param string $and
     * @return string
     */
    function implodeAnd(array $haystack, string $glue=', ', string $and = ' and '): string
    {
        $str = '';
        $len = count($haystack);

        //Singular/empty array
        if(empty($haystack)){
            return '';
        }elseif ($len< 2){
            return $haystack[0];
        }

        //Process
        for($i=0; $i<$len; $i++){
            if($i === $len - 1){
                $str .= $haystack[$i];
            }else if($i === $len -2){
                $str .= $haystack[$i] . $and;
            }else{
                $str .= $haystack[$i] . $glue;
            }
        }

        return $str;
    }
}
if(!function_exists('yearsSelectArray')){
    /**
     * Generate years to date as a collection
     * @param bool $nextYear
     * @return Collection
     */
    function yearsSelectArray(bool $nextYear=true): Collection
    {
        $start = $nextYear ? date('Y') + 1 : date('Y');
        $range = range($start, config('project.year_start'), -1);
        $options = array_combine($range, $range);

        return collect($options);
    }
}
