<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 24-Jul-18
 * Time: 1:14 AM
 */

if (!function_exists('getFileExtension')) {
    function getFileExtension ($filename)
    {
        return preg_replace("/.*\.([^.]+)$/","\\1", $filename);
    }

}


if (!function_exists('getUniqueFileName')) {
    function getUniqueFileName($checkPath,$filename,$ext)
    {
        $uniqueFilename = uniqid($filename."-");
        $completePath = $checkPath.$uniqueFilename.".".$ext;

        /*echo "<br><br>".$completePath;
        echo "<br><br>file_exist : "; var_dump(file_exists($checkPath.$uniqueFilename));*/

        while(file_exists($completePath)){
            $uniqueFilename = uniqid($filename."-");
            $completePath = $checkPath.$uniqueFilename.".".$ext;
        }

        return $uniqueFilename;
    }
}