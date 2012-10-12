<?php
/**
 * Fluent interface example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Fluent_interface
 */

class Product
{
    protected $valueA;
    protected $valueB;
    protected $valueC;

    public function setValueA($valueA)
    {
        $this->valueA = $valueA;
        return $this;
    }

    public function getValueA()
    {
        return $this->valueA;
    }

    public function setValueB($valueB)
    {
        $this->valueB = $valueB;
        return $this;
    }

    public function getValueB()
    {
        return $this->valueB;
    }

    public function setValueC($valueC)
    {
        $this->valueC = $valueC;
        return $this;
    }

    public function getValueC()
    {
        return $this->valueC;
    }
}

$product = new Product();
$product->setValueA('A')
        ->setValueB('B')
        ->setValueC('C');
