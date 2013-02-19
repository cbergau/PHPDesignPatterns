<?php
/**
 * Builder example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Builder_pattern
 */

class Director
{
    protected $productBuilder;

    public function setProductBuilder(Builder $productBuilder)
    {
        $this->productBuilder = $productBuilder;
    }

    public function getProduct()
    {
        return $this->productBuilder->getProduct();
    }

    public function constructProduct()
    {
        $this->productBuilder->createNewProduct();
        $this->productBuilder->buildMemberA();
        $this->productBuilder->buildMemberB();
    }
}

abstract class Builder
{
    protected $product;

    public function getProduct()
    {
        return $this->product;
    }

    public function createNewProduct()
    {
        $this->product = new Product();
    }

    abstract public function buildMemberA();
    abstract public function buildMemberB();
}

class ConcreteBuilder extends Builder
{
    public function buildMemberA()
    {
        $this->product->setMemberA('A');
    }

    public function buildMemberB()
    {
        $this->product->setMemberB('B');
    }
}

class Product
{
    protected $memberA;
    protected $memberB;

    public function setMemberA($memberA)
    {
        $this->memberA = $memberA;
    }

    public function getMemberA()
    {
        return $this->memberA;
    }

    public function setMemberB($memberB)
    {
        $this->memberB = $memberB;
    }

    public function getMemberB()
    {
        return $this->memberB;
    }
}

$director       = new Director();
$productBuilder = new ConcreteBuilder();

$director->setProductBuilder($productBuilder);
$director->constructProduct();

$product = $director->getProduct();

var_dump($product);
