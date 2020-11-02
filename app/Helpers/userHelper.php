<?php

use App\Customers\Models\Company;
use App\Profile;
use App\User;
use App\WatchList;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

if(!function_exists('userPhoto')){
    /**
     * Get url of a user's profile photo
     * @param string $image
     * @param string $size
     * @return string
     */
    function userPhoto(string $image, string $size='avatar'): string{
        return asset('users/photo/'. $size . '/' . $image);
    }
}
if(!function_exists('userPhotoName')){
    /**
     * Compose a user profile photo name
     * @param User $user
     * @param $ext
     * @return string
     */
    function userPhotoName(User $user, $ext){
        return 'img-' .  hashEncode($user->id) . '-' . date('U') . '.' . $ext;
    }
}
if(!function_exists('userPhotoUrl')){
    /**
     * Get url of user's photo
     * @param User $user
     * @param string $size
     * @return string|null
     */
    function userPhotoUrl(User $user, string $size='avatar'){
        if(!in_array($size, ['large', 'avatar'])){
            return null;
        }
        return asset(config('project.userPhoto') . '/' . $size . '/' .  $user->photo);
    }
}
if(!function_exists('userOne')){
    /**
     * Return details of User One
     * @return User
     */
    function userOne(): User{
        return Company::first()->userOne;
    }
}
if(!function_exists('isUserOne')){
    /**
     * Check if a user is User One
     * @param User $user
     * @return bool
     */
    function isUserOne(User $user): bool{
        $userOne = userOne();
        if($user->id == $userOne->id){
            return true;
        }else{
            return false;
        }
    }
}
if(!function_exists('watchListsVideos')){
    /**
     * Get all the watch lists and respective videos of a user
     * @param null $user
     * @return array|Builder[]|Collection
     */
    function watchListsVideos($user=null){
        if($user === null){
            return [];
        }

        $lists = WatchList::with(['videos.video'])
            ->where('user_id', $user->id)
            ->get();

        return $lists;
    }
}
if(!function_exists('userPosition')){
    /**
     * Get user's position
     * @param User $user
     * @return string
     */
    function userPosition(User $user): string
    {
        return 'User';
    }
}
