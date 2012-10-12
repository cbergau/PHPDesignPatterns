<?php
/**
 * Composite pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Composite_pattern
 */

interface ComponentInterface
{
    public function operation();
}

class ConcreteComponent implements ComponentInterface
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function operation()
    {
        echo '['.$this->name.'] operation done';
    }
}

class Composite implements ComponentInterface
{
    protected $components = array();

    public function add(ComponentInterface $component)
    {
        $this->components[] = $component;
    }

    public function operation()
    {
        foreach ($this->components as $component) {
            $component->operation();
        }
    }
}

$composite = new Composite();
$composite->add(new ConcreteComponent('FirstComponent'));
$composite->add(new ConcreteComponent('SecondComponent'));
$composite->add(new ConcreteComponent('ThirdComponent'));

$composite->operation();

