<?php


namespace App\Classes;

use Exception;
use Hyn\Tenancy\Contracts\Website;
use Hyn\Tenancy\Contracts\Website\UuidGenerator;
use Ramsey\Uuid\Uuid;

class HynShaGenerator implements UuidGenerator
{
    /**
     * @param Website $website
     * @return string
     * @throws Exception
     */
    public function generate(Website $website) : string
    {
        //return 'BQHr_' . date('U') . '_' . str_random(12);
        $name = str_replace(' ', '', strtolower(config('project.appNameShort')));
        $prefix = $name . '_' . date('U') . '_';
        $length = 6;
        $hex = '';
        try {
            $hex = bin2hex(random_bytes($length));
        } catch (Exception $e) {
        }

        $sha = $prefix . $hex;

        //Check if sha already exist
        while(\App\Website::where('uuid', $sha)->count() > 0 ) {
            try {
                $hex = bin2hex(random_bytes($length));
            } catch (Exception $e) {
            }

            $sha = $prefix . $hex;
        }

        return $sha;
    }
}
