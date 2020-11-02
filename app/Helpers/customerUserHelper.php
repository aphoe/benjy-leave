<?php

use App\Customers\Models\PersonalRecord;
use App\Customers\Models\User;

if(!function_exists('profileUpdateStats')){
    /**
     * Profile completion stat of a user
     * @param int $id
     * @return object
     */
    function profileUpdateStats(int $id): object
    {
        $user = User::with([
            'personalRecord',
            'contactRecord',
            'employmentRecord',
        ])
            ->withCount([
                'relatives',
                'documents',
                'experiences',
                'educationRecords',
                'jobTitleRecords',
                'emergencyContacts',
            ])
        ->findOrFail($id);
        //dd($user);

        $stats = [
            'total' => 9,
            'update' => 4,
            'fill' => 5,
            'completed' => 0,
        ];

        if($user->personalRecord->updated){
            $stats['completed']++;
        }
        if($user->contactRecord->updated){
            $stats['completed']++;
        }
        if($user->employmentRecord->updated){
            $stats['completed']++;
        }

        if($user->emergency_contacts_count > 0){
            $stats['completed']++;
        }
        if($user->relatives_count > 0){
            $stats['completed']++;
        }
        if($user->documents_count > 0){
            $stats['completed']++;
        }
        if($user->experiences_count > 0){
            $stats['completed']++;
        }
        if($user->education_records_count > 0){
            $stats['completed']++;
        }
        if($user->job_titles_count > 0){
            $stats['completed']++;
        }

        $percent = ($stats['completed'] / $stats['total']) * 100;
        $stats['completed_percent'] = (float) number_format($percent, 3);

        return (object) $stats;
    }
}
if(!function_exists('personalIdUrl')){
    /**
     * Personal record Identification
     * @param PersonalRecord $personalRecord
     * @return string
     */
    function personalIdUrl(PersonalRecord $personalRecord):string
    {
        $website = customerWebsite();
        $url = customerAsset($website, 'users/ids', $personalRecord->identification);
        return $url;
    }
}
