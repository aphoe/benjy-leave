<?php


namespace App\Classes;


use App\Interfaces\CustomerFolders;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\File;

class CustomerHandler implements CustomerFolders
{
    private $website;

    public function __construct()
    {
        $this->website = $this->customerWebsite();
    }

    /*
     * Accessors
     */
    public function getWebsite(): Website
    {
        return $this->website;
    }

    /*
     * Methods
     */

    /**
     * Setup public folders for a customer
     * @param Website $website
     */
    public function setupPublicFolders(Website $website): void
    {
        $customerAssets = $this->directorySeparator(public_path('assets/customers') . '/');
        $customerPath = $this->directorySeparator(public_path('customers/' . $website->uuid). '/');

        //Create Company public directory if it does not exist
        File::ensureDirectoryExists($customerPath);
        File::put($customerPath . 'gitkeep', null); //gitkeep

        //Users folders
        $usersFolder = $this->directorySeparator($customerPath . 'users/');
        $usersAvatarFolder = $this->directorySeparator($usersFolder . 'photo/avatar/');
        $usersLargeFolder = $this->directorySeparator($usersFolder . 'photo/large/');
        $usersEmergencyAvatarFolder = $this->directorySeparator($usersFolder . 'emergency/avatar/');
        $usersEmergencyLargeFolder = $this->directorySeparator($usersFolder . 'emergency/large/');
        $usersDocsFolder = $this->directorySeparator($usersFolder . 'documents/');
        $usersIdsFolder = $this->directorySeparator($usersFolder . 'ids/');
        $usersCertsFolder = $this->directorySeparator($usersFolder . 'certifications/');
        $usersTrainingFolder = $this->directorySeparator($usersFolder . 'trainings/');

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
            $this->directorySeparator($customerAssets . 'users/photo/avatar/default.png'),
            $this->directorySeparator($usersAvatarFolder . '/default.png')
        );
        File::copy(
            $this->directorySeparator($customerAssets . 'users/photo/large/default.png'),
            $this->directorySeparator($usersLargeFolder . '/default.png')
        );
        File::copy(
            $this->directorySeparator($customerAssets . 'users/photo/avatar/default.png'),
            $this->directorySeparator($usersEmergencyAvatarFolder . '/default.png')
        );
        File::copy(
            $this->directorySeparator($customerAssets . 'users/photo/large/default.png'),
            $this->directorySeparator($usersEmergencyLargeFolder . '/default.png')
        );

        //Documents, identities, trainings and certifications
        File::ensureDirectoryExists($usersDocsFolder);
        File::put($usersDocsFolder . 'gitkeep', null);
        File::ensureDirectoryExists($usersIdsFolder);
        File::put($usersIdsFolder . 'gitkeep', null);
        File::ensureDirectoryExists($usersCertsFolder);
        File::put($usersCertsFolder . 'gitkeep', null);
        File::ensureDirectoryExists($usersTrainingFolder);
        File::put($usersTrainingFolder . 'gitkeep', null);
        File::copy(
            $this->directorySeparator($customerAssets . 'users/ids/default.png'),
            $this->directorySeparator($usersIdsFolder . 'default.png')
        );
        File::copy(
            $this->directorySeparator($customerAssets . 'users/certifications/default.png'),
            $this->directorySeparator($usersCertsFolder . 'default.png')
        );
        File::copy(
            $this->directorySeparator($customerAssets . 'users/trainings/default.png'),
            $this->directorySeparator($usersTrainingFolder . 'default.png')
        );

        //Company
        $companyFolder = $this->directorySeparator($customerPath . 'company/');
        $logoFolder = $this->directorySeparator($companyFolder . 'logo/');
        File::ensureDirectoryExists($companyFolder);
        File::ensureDirectoryExists($logoFolder);

        File::put($companyFolder . 'gitkeep', null);
        File::put($logoFolder . 'gitkeep', null);

        File::copy(
            $this->directorySeparator($customerAssets . 'company/logo/default.png'),
            $this->directorySeparator($logoFolder . '/default.png')
        );
    }

    /**
     * Remove customer public folder directories
     */
    public function deletePublicFolder(Website $website): void
    {
        $customerPath = public_path('customers/' . $website->uuid);
        $customerPath = $this->directorySeparator($customerPath);

        try {
            File::deleteDirectory($customerPath);
        }catch (\Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Customer asset file
     * @param string $folder
     * @param string $file
     * @return string
     */
    public function asset(string $folder, string $file): string
    {
        return $this->assetFolder($folder) . $file;
    }

    /**
     * Customer assets folder
     * @param string $folder
     * @return string
     */
    public function assetFolder(string $folder): string
    {
        return asset('customers/' . $this->website->uuid . '/' . $folder) . '/';
    }

    /**
     * Public folder of  customer
     * @param string|null $subFolder
     * @param bool $create
     * @return string
     */
    public function publicPath(string $subFolder=null, bool $create=true): string
    {
        $path = public_path('customers/' . $this->website->uuid) . '/';

        if($subFolder !== null){
            $path .= $subFolder . '/';
        }

        $path =  $this->directorySeparator($path);

        if($create){
            File::ensureDirectoryExists($path);
        }

        return $path;
    }

    /*
     * Private methods
     */

    /**
     * Return a customer's website object
     * @return Website
     */
    private function customerWebsite(): ?Website
    {
        return app(Environment::class)->tenant();
    }

    /**
     * Change to director separator in a given path for OS
     * @param string $path
     * @return string
     */
    private function directorySeparator(string $path): string{
        return str_replace('/', DIRECTORY_SEPARATOR, $path);
    }
}
