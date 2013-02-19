<?php
/**
 * Abstract factory example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @link      http://en.wikipedia.org/wiki/Abstract_factory_pattern
 */

abstract class AbstractFactory
{
    abstract function createProductA();
    abstract function createProductB();
}

class ConcreteFactory1 extends AbstractFactory
{
    function createProductA()
    {
        return new ProductA1();
    }

    function createProductB()
    {
        return new ProductB1();
    }
}

class ConcreteFactory2 extends AbstractFactory
{
    function createProductA()
    {
        return new ProductA2();
    }

    function createProductB()
    {
        return new ProductB2();
    }
}

abstract class AbstractProductA
{
    abstract public function action();
}

class ProductA1 extends AbstractProductA
{
    public function action()
    {
        echo "I am ProductA1";
    }
}

class ProductA2 extends AbstractProductA
{
    public function action()
    {
        echo "I am ProductA2";
    }
}

abstract class AbstractProductB
{
    abstract public function action();
}

class ProductB1 extends AbstractProductB
{
    public function action()
    {
        echo "I am ProductB1";
    }
}

class ProductB2 extends AbstractProductB
{
    public function action()
    {
        echo "I am ProductB2";
    }
}

$factory = new ConcreteFactory1();
$productA = $factory->createProductA();
$productA->action();

$factory = new ConcreteFactory2();
$productA = $factory->createProductA();
$productA->action();
