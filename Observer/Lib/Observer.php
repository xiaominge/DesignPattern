<?php

namespace Observer\Lib;

class Observer implements \SplObserver
{

    public function __construct()
    {

    }

    /**
     * 观察者对象执行更新操作
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        $event = $subject->event;
        if (method_exists($this, $event)) {
            $this->$event($subject);
        }
    }

}
