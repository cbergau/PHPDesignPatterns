<?php
/**
 * Observer pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Observer_pattern
 */

interface Observer
{
    public function update(Observable $subject);
}

interface Observable
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

class Subject implements Observable
{
    protected $observers = array();
    protected $value = 0;

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
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

class ValueObserver implements Observer
{
    public function update(Observable $subject)
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