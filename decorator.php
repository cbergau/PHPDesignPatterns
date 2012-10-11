<?php
/**
 * Decorator pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
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

abstract class Decorator implements ComponentInterface
{
    protected $component;

    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }

    abstract public function operation();
}

class ConcreteDecorator extends Decorator
{
    public function operation()
    {
        return '[decorated]'.$this->component->operation().'[decorated]';
    }
}

$component = new ConcreteComponent();
$decorated = new ConcreteDecorator($component);
echo $decorated->operation();
