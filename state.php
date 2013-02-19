<?php
/**
 * State pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @link      http://en.wikipedia.org/wiki/State_pattern
 */

interface StateInterface
{
    public function writeValue(Context $context, $value);
}

class ConcreteStateA implements StateInterface
{
    public function writeValue(Context $context, $value)
    {
        echo strtolower($value);
        $context->setState(new ConcreteStateB());
    }
}

class ConcreteStateB implements StateInterface
{
    protected $counter = 0;

    public function writeValue(Context $context, $value)
    {
        echo strtoupper($value);

        if (++$this->counter > 1) {
            $context->setState(new ConcreteStateA());
        }
    }
}

class Context
{
    protected $state;

    public function __construct()
    {
        $this->state = new ConcreteStateA();
    }

    public function setState(StateInterface $state)
    {
        $this->state = $state;
    }

    public function writeValue($value)
    {
        $this->state->writeValue($this, $value);
    }
}

$context = new Context();
$context->writeValue('Monday');
$context->writeValue('Tuesday');
$context->writeValue('Wednesday');
$context->writeValue('Thursday');
$context->writeValue('Friday');
$context->writeValue('Saturday');
$context->writeValue('Sunday');
