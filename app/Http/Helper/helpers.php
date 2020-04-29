<?php

use Carbon\Carbon;

if (!function_exists('getCreatedFromTime')) {
    function getCreatedFromTime($post)
    {
        return Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans();
    }
}

if (!function_exists('getUpdatedFromTime')) {
    function getUpdatedFromTime($post)
    {
        return Carbon::createFromTimeStamp(strtotime($post->updated_at))->diffForHumans();
    }
}

if (!function_exists('getAvatar')) {
    function getAvatar($image) {
        $imagePath = '/theme/socialyte/img/default_avatar.jpg';

        if ($image) {
            $imagePath = asset('storage/images/users/' . $image);
        }

        return $imagePath;
    }
}

if (!function_exists('getCover')) {
    function getCover($image) {
        $imagePath = '/theme/socialyte/img/default_photo.png';

        if ($image) {
            $imagePath = asset('storage/images/users/' . $image);
        }

        return $imagePath;
    }
}
