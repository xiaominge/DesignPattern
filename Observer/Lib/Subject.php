<?php

namespace Observer\Lib;

class Subject implements \SplSubject
{
    /**
     * 存储所有观察者对象
     *
     * @var \SplObjectStorage
     */
    protected $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    /**
     * 注册一个新观察者对象
     *
     * @param \SplObserver $observer
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * 删除观察者对象
     *
     * @param \SplObserver $observer
     *
     * @return void
     */
    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * 通知观察者对象
     *
     * @return void
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
