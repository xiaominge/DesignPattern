<?php

namespace Observer\Observer\User;

use Observer\Lib\Observer;

/**
 * class User Pm Observer
 */
class Pm extends Observer
{
    public function test(\SplSubject $subject)
    {
        echo "Hi, Pm. " . get_class($subject) . ' 执行了 ' . $subject->event . PHP_EOL;
    }
}
