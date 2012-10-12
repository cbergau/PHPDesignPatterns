<?php
/**
 * Facade pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Facade_pattern
 */

class ProductA
{
    public function operation()
    {
        echo 'ProductA operation.';
    }
}

class ProductB
{
    public function execute()
    {
        echo 'ProductB execute.';
    }
}

class ProductC
{
    public function make()
    {
        echo 'ProductC make.';
    }
}

class ProductFacade
{
    protected $productA;
    protected $productB;
    protected $productC;

    public function __construct($productA, $productB, $productC)
    {
        $this->productA = $productA;
        $this->productB = $productB;
        $this->productC = $productC;
    }

    public function doSomething()
    {
        $this->productA->operation();
        $this->productB->execute();
        $this->productC->make();
    }
}

$facade = new ProductFacade(new ProductA(), new ProductB(), new ProductC());
$facade->doSomething();
