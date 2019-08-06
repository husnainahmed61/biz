<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 29-Jul-18
 * Time: 5:39 PM
 */

if (!function_exists('getImageDimensions')) {
    function getImageDimensions ($filename)
    {
        $imageData = getimagesize($filename);

        return ['width'=> $imageData['0'] , 'height'=> $imageData['1']];
    }

}