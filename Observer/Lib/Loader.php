<?php

class Loader
{

    public static $vendorMap = [
        APPNAME => PATH,
    ];

    public static function autoload($class)
    {
        $file = self::findFile($class);
        if (file_exists($file)) self::includeFile($file);
    }

    public static function findFile($class)
    {
        $vendor = substr($class, 0, strpos($class, '\\'));
        $vendorDir = self::$vendorMap[$vendor];
        $filePath = substr($class, strlen($vendor)) . ".php";
        $filePath = $vendorDir . $filePath;
        $file = strtr($filePath, '\\', DS);
//        var_dump($file);
        return $file;
    }

    public static function includeFile($file)
    {
        if (is_file($file)) include $file;
    }

}