<?php
/**
 * Factory method pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Factory_pattern
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

class ComplexProductFactory
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

class SimpleProductFactory
{
    public function factory($type)
    {
        $className = $type.'Product';
        if (!class_exists($className)) {
            throw new Exception('Class '.$className.' not found');
        }
        return new $className;
    }
}

// Using the ComplexProductFactory
$productFactory = new ComplexProductFactory();
$product = $productFactory->factory('Concrete');
echo $product->getName();

// Using the SimpleProductFactory
$simpleProductFactory = new SimpleProductFactory();
$product = $simpleProductFactory->factory('AnotherConcrete');
echo $product->getName();
