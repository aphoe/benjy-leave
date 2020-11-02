<?php

if(!function_exists('hashDecode')){
    /**
     * return decoded int from HashIds
     * @param string $hash
     * @return int
     */
    function hashDecode(string $hash): int{
        try {
            $decs = \Hashids::decode($hash);
            return $decs[0];
        }catch (Exception $exception){
            return 0;
        }
    }
}
if(!function_exists('hashEncode')){
    /**
     * Encode an integer using \HashId
     * @param $int
     * @return mixed
     */
    function hashEncode($int){
        return \Hashids::encode($int);
    }
}