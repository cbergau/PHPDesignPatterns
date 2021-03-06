<?php
/**
 * Decorator pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @link      http://en.wikipedia.org/wiki/Decorator_pattern
 */

interface ComponentInterface
{
    public function operation();
}

class ConcreteComponent implements ComponentInterface
{
    public function operation()
    {
        return 'operation';
    }
}

abstract class AbstractDecorator implements ComponentInterface
{
    protected $component;

    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }
}

class ConcreteDecorator extends AbstractDecorator
{
    public function operation()
    {
        return '[decorated]'.$this->component->operation().'[decorated]';
    }
}

$component = new ConcreteDecorator(new ConcreteComponent());
echo $component->operation();
