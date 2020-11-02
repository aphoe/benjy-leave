<?php
use App\Customers\Models\Log;

if(!function_exists('logUser')){
    /**
     * Log a user
     * @param int $crud
     * @param string $action
     * @param string $details
     * @param bool $hash
     */
    function logUser(int $crud, string $action, string $details=null, bool $hash=true): void
    {
        $log = new Log();
        $log->user_id = \Auth::check() ? \Auth::user()->id : NULL;
        $log->ip = $_SERVER['REMOTE_ADDR'];
        $log->crud = $crud;
        $log->action = $action;
        $log->details = $hash ? hashEncode($details) : $details;
        $log->save();
    }
}
if(!function_exists('logActionDescription')){
    /**
     * Human readable log action
     * @param string $action
     * @param string $remove
     * @param string $breaker
     * @return string
     */
    function logActionDescription(string $action, string $remove, string $breaker='-'): string {
        $removed = str_replace($remove . $breaker, '', $action);
        return ucwords(str_replace($breaker, ' ', $removed));
    }
}

