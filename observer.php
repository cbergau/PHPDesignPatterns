<?php
/**
 * Observer pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @link      http://en.wikipedia.org/wiki/Observer_pattern
 */

/*
These interfaces are part of the Standard PHP library and can be used > 5.1.0

http://www.php.net/manual/en/class.splsubject.php
http://www.php.net/manual/en/class.splobserver.php

interface SplObserver  {
    abstract public function update ($subject) {}
}

interface SplSubject  {
    abstract public function attach ($observer) {}
    abstract public function detach ($observer) {}
    abstract public function notify () {}
}
*/

class Subject implements SplSubject
{
    protected $observers = array();
    protected $value = 0;

    public function attach(SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        $this->observers = array_diff($this->observers, array($observer));
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function increaseValue($increaseBy)
    {
        $this->value += $increaseBy;
        $this->notify();
    }

    public function getValue()
    {
        return $this->value;
    }
}

class ValueObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        if ($subject->getValue() > 20) {
            echo "Value is greater than 20!";
        }
    }
}

$subject = new Subject();
$subject->attach(new ValueObserver());
$subject->increaseValue(10);
$subject->increaseValue(4);
$subject->increaseValue(3);
$subject->increaseValue(7);