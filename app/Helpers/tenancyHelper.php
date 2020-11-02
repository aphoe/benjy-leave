<?php

use App\Customers\Models\OfficeBranch;
use App\Customers\Models\User;
use App\Subscription;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;

if(!function_exists('subDomainFqdn')){
    /**
     * Get subdomain type FQDN
     * @param string $sub
     * @return string
     */
    function subDomainFqdn(string $sub): string {
        $baseUrl = config('project.baseUrl');
        return $sub . '.' . $baseUrl;
    }
}
if(!function_exists('isSystem')){
    /**
     * Check if URL is currently system URL
     * @return bool
     */
    function isSystem(): bool {
        $host = request()->getHost();
        if($host === env('APP_BASE_URL')){
            return true;
        }

        return false;
    }
}
if(!function_exists('isCustomer')){
    /**
     * Check if URL is currently customer URL
     * @return bool
     */
    function isCustomer(){
        $host = request()->getHost();
        if($host !== env('APP_BASE_URL')){
            return true;
        }

        return false;
    }
}
if(!function_exists('allowedUsers')){
    /**
     * Get allowed users statistics for a customer
     * @return object
     */
    function allowedUsers(): object
    {
        //Get current subscription
        $website = app(Environment::class)->tenant();
        $subscription = latestCustomerSubscription($website, ['plan.feature']);

        //Users number
        $allowed = $subscription->additional_users + $subscription->plan->feature->users;
        $used = User::all()->count();

        return (object) [
            'allowed' => $allowed,
            'used' => $used,
            'left' => $allowed - $used
        ];
    }
}
if(!function_exists('allowedBranches')){
    /**
     * Allowed branch statistics for a customer
     * @return object
     */
    function allowedBranches(): object
    {
        //Get current subscription
        $website = app(Environment::class)->tenant();
        $subscription = latestCustomerSubscription($website, ['plan.addon']);

        //Allowed branches
        $allowed = $subscription->plan->addon->branches;
        $used = OfficeBranch::count();

        return (object) [
            'allowed' => $allowed,
            'used' => $used,
            'left' => $allowed - $used
        ];
    }
}
if(!function_exists('latestCustomerSubscription')){
    /**
     * Get a customer's last subscription
     * @param Website $website
     * @param array $with
     * @return Subscription
     */
    function latestCustomerSubscription(Website $website, array $with = []): Subscription{
        $subscription = Subscription::with($with)
            ->where('website_id', $website->id)
            ->orderBy('created_at', 'desc')
            ->first();

        return $subscription;
    }
}
