<?php
/**
 * Factory method pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 */

interface ProductInterface
{
    public function getName();
}

class ConcreteProduct implements ProductInterface
{
    public function getName()
    {
        return 'ConcreteProduct';
    }
}

class AnotherConcreteProduct implements ProductInterface
{
    public function getName()
    {
        return 'AnotherConcreteProduct';
    }
}

class ProductFactory
{
    public function factory($type)
    {
        switch ($type)
        {
            case 'Concrete':
                $product = new ConcreteProduct();
                break;
            case 'AnotherConcrete':
                $product = new AnotherConcreteProduct();
                break;
            default:
                throw new Exception('Invalid type');
        }

        return $product;
    }
}

$productFactory = new ProductFactory();
$product = $productFactory->factory('Concrete');
echo $product->getName();
