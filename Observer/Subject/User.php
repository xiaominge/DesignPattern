<?php

namespace Observer\Subject;

use Observer\Lib\Subject;

class User extends Subject
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 重载属性
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
