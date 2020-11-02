<?php

use App\Customers\Models\Company;
use App\Customers\Models\OfficeBranch;
use App\Customers\Models\User;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\File;

if(!function_exists('industries')){
    /**
     * Return industries as listed by US' Standard Industrial Classification
     * @return array
     */
    function industries(){
        $industries = [
            'Advertising',
            'Agriculture',
            'Architecture and Interior',
            'Automobiles',
            'Carpentary and Furniture',
            'Clothing and Textile',
            'Communications',
            'Construction',
            'Consulting',
            'Creative Industries',
            'Education',
            'Energy',
            'Engineering',
            'Entertainment',
            'Events',
            'Farming',
            'Fashion',
            'Fast Moving Consumer Goods',
            'Finance',
            'Food Industry',
            'Green Industry',
            'Heavy Industry',
            'Hospitality',
            'Housing and Real Estate',
            'Information Technology',
            'Infrastructure',
            'Insurance',
            'International Affairs',
            'Journalism',
            'Jewelry, Perfumes and Cosmetics',
            'Law',
            'Light Industry',
            'Manufacturing',
            'Materials',
            'Marketing and Sales',
            'Media',
            'Medicine and Healthcare',
            'Music',
            'Non-Profit',
            'Oil and Gas',
            'Primary Industry',
            'Professional Services',
            'Public Services',
            'Publishing',
            'Research and Development',
            'Robotics',
            'Secondary Industry',
            'Service Industry',
            'Space',
            'Sport, Games and Recreation',
            'Technology',
            'Telecommunications',
            'Tertiary Sector',
            'Transportation',
            'Travel and Tourism',
            'Wholesale and Retail',
        ];
        sort($industries);
        return $industries;
    }
}
if(!function_exists('htmlIndustries')){
    /**
     * industries as to be used in form Select tag
     */
    function htmlIndustries(): array
    {
        $industries = industries();
        $array = array_combine($industries, $industries);
        return $array;
    }
}
if(!function_exists('customerSetupPublicFolders')){
    /**
     * Setup public folders for a customer
     * @param Website $website
     */
    function customerSetupPublicFolders(Website $website): void
    {
        $customerAssets = directorySeparator(public_path('assets/customers') . '/');
        $customerPath = directorySeparator(public_path('customers/' . $website->uuid). '/');

        //Create Company public directory if it does not exist
        File::ensureDirectoryExists($customerPath);
        File::put($customerPath . 'gitkeep', null); //gitkeep

        //Users folders
        $usersFolder = directorySeparator($customerPath . 'users/');
        $usersAvatarFolder = directorySeparator($usersFolder . 'photo/avatar/');
        $usersLargeFolder = directorySeparator($usersFolder . 'photo/large/');
        $usersEmergencyAvatarFolder = directorySeparator($usersFolder . 'emergency/avatar/');
        $usersEmergencyLargeFolder = directorySeparator($usersFolder . 'emergency/large/');
        $usersDocsFolder = directorySeparator($usersFolder . 'documents/');
        $usersIdsFolder = directorySeparator($usersFolder . 'ids/');

        File::ensureDirectoryExists($usersFolder);
        File::ensureDirectoryExists($usersAvatarFolder);
        File::ensureDirectoryExists($usersLargeFolder);
        File::ensureDirectoryExists($usersEmergencyAvatarFolder);
        File::ensureDirectoryExists($usersEmergencyLargeFolder);

        //Add default images and gitkeep
        File::put($usersFolder . 'gitkeep', null);
        File::put($usersAvatarFolder . 'gitkeep', null);
        File::put($usersLargeFolder . 'gitkeep', null);
        File::put($usersEmergencyAvatarFolder . 'gitkeep', null);
        File::put($usersEmergencyLargeFolder . 'gitkeep', null);

        //Add default images
        File::copy(
            directorySeparator($customerAssets . 'users/photo/avatar/default.png'),
            directorySeparator($usersAvatarFolder . '/default.png')
        );
        File::copy(
            directorySeparator($customerAssets . 'users/photo/large/default.png'),
            directorySeparator($usersLargeFolder . '/default.png')
        );
        File::copy(
            directorySeparator($customerAssets . 'users/photo/avatar/default.png'),
            directorySeparator($usersEmergencyAvatarFolder . '/default.png')
        );
        File::copy(
            directorySeparator($customerAssets . 'users/photo/large/default.png'),
            directorySeparator($usersEmergencyLargeFolder . '/default.png')
        );

        //Documents and identities
        File::ensureDirectoryExists($usersDocsFolder);
        File::put($usersDocsFolder . 'gitkeep', null);
        File::ensureDirectoryExists($usersIdsFolder);
        File::put($usersIdsFolder . 'gitkeep', null);
        File::copy(
            directorySeparator($customerAssets . 'users/ids/default.png'),
            directorySeparator($usersIdsFolder . 'default.png')
        );

        //Company
        $companyFolder = directorySeparator($customerPath . 'company/');
        $logoFolder = directorySeparator($companyFolder . 'logo/');
        File::ensureDirectoryExists($companyFolder);
        File::ensureDirectoryExists($logoFolder);

        File::put($companyFolder . 'gitkeep', null);
        File::put($logoFolder . 'gitkeep', null);

        File::copy(
            directorySeparator($customerAssets . 'company/logo/default.png'),
            directorySeparator($logoFolder . '/default.png')
        );
    }
}
if(!function_exists('customerDeletePublicFolder')){
    /**
     * Remove customer public folder directories
     * @param Website $website
     */
    function customerDeletePublicFolder(Website $website){
        $customerPath = public_path('customers/' . $website->uuid);
        $customerPath = directorySeparator($customerPath);

        try {
            File::deleteDirectory($customerPath);
        }catch (\Exception $e){
            $e->getMessage();
        }
    }
}
if(!function_exists('customerAsset')){
    /**
     * Customer asset file
     * @param Website $website
     * @param string $folder
     * @param string $file
     * @return string
     */
    function customerAsset(Website $website, string $folder, string $file): string
    {
        return customerAssetFolder($website, $folder) . $file;
    }
}
if(!function_exists('customerAssetFolder')){
    /**
     * Customer assets folder
     * @param Website $website
     * @param string $folder
     * @return string
     */
    function customerAssetFolder(Website $website, string $folder): string
    {
        return asset('customers/' . $website->uuid . '/' . $folder) . '/';
    }
}
if(!function_exists('customerPublicPath')){
    /**
     * Public folder of  customer
     * @param Website|null $website
     * @param string|null $subfolder
     * @return string
     */
    function customerPublicPath(Website $website = null, string $subfolder=null): string{
        if($website === null) {
            $website = app(Environment::class)->tenant();
        }
        $path = public_path('customers/' . $website->uuid) . '/';

        if($subfolder !== null){
            $path .= $subfolder . '/';
        }

        return directorySeparator($path);
    }
}
if(!function_exists('companyField')){
    /**
     * Get a field from stored company information
     * @param string $field
     * @return mixed
     */
    function companyField(string $field){
        $company = Company::first()->toArray();
        return $company[$field];
    }
}
if(!function_exists('staffFormArray')){
    /**
     * Create a form array of staff members
     * @return array
     */
    function staffFormArray(): array
    {
        $people = User::orderBy('surname')->get(['id', 'surname', 'first_name', 'other_name']);
        $staffs = [];

        foreach ($people as $person){
            $staffs[$person->id] = $person->official_name;
        }

        return $staffs;
    }
}
if(!function_exists('branchFormArray')){
    /**
     * Get office branches as an array
     * @return array
     */
    function branchFormArray(){
        $branches = OfficeBranch::orderBy('country')
            ->orderBy('state')
            ->orderBy('city')
            ->orderBy('name')
            ->get();

        $returns = [];

        foreach ($branches as $branch){
            $address = $branch->name . ' - ' . $branch->city . ', ';
            $address .= $branch->state_name . ', ' . $branch->country_name;
            $returns[$branch->id] = $address;
        }

        return $returns;
    }
}
if(!function_exists('userFormArray')){
    /**
     * Get users as an array
     * @return array
     */
    function userFormArray(): array
    {
        $users = User::orderBy('surname')
            ->orderBy('first_name')
            ->orderBy('other_name')
            ->get();

        $returns = [];
        foreach($users as $user){
            $returns[$user->id] = $user->official_name;
        }

        return $returns;
    }
}
if(!function_exists('customerUserPhoto')){
    /**
     * A customer's staff's user photo URL
     * @param string $image
     * @param string $size
     * @return string
     */
    function customerUserPhoto(string $image, string $size='avatar'){
        $website = app(Environment::class)->tenant();
        $folder = customerAssetFolder($website, 'users/photo');
        return $folder . $size . '/' . $image;
    }
}
if(!function_exists('customerWebsite')){
    /**
     * A customer's website model
     * @return \Hyn\Tenancy\Contracts\Tenant|\Hyn\Tenancy\Contracts\Website|null
     */
    function customerWebsite(){
        return app(Environment::class)->tenant();
    }
}
