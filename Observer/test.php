<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH', dirname(__FILE__) . DS);
define('APPNAME', 'Observer');
define('ObserverPath', PATH . "Observer" . DS);
define('ObserverNameSpace', APPNAME . '\Observer\\');

require PATH . 'Lib' . DS . 'Loader.php';
spl_autoload_register('Loader::autoload');


use Observer\Lib\Helper;
use Observer\Subject\User;

$user = new User();
$observers = Helper::getObserver($user);
foreach ($observers as $observer) {
    $user->attach($observer);
}
$user->event = 'test';
$user->notify();
