<?php

namespace Observer\Lib;

class Helper
{
    public static function getObserver($subject)
    {
        $observers = [];
        $subjectName = get_class($subject);
        $subjectName = basename(str_replace("\\", '/', $subjectName));
        $observerDir = ObserverPath . $subjectName . DS;
//        echo $observerDir . PHP_EOL;
        $observerConfig = require $observerDir . "config.php";
        foreach ($observerConfig as $observerName) {
            if (!file_exists($observerDir . $observerName . ".php")) {
                continue;
            }
            $className = ObserverNameSpace . $subjectName . "\\" . $observerName;
            $observers[] = new $className;
        }
        return $observers;
    }
}

