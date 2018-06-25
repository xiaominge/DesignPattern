<?php

namespace Observer\Observer\User;

use Observer\Lib\Observer;

/**
 * class User Notice Observer
 */
class Notice extends Observer
{
    public function test(\SplSubject $subject)
    {
        echo "Hi, Notice. " . get_class($subject) . ' 执行了 ' . $subject->event . PHP_EOL;
    }
}
