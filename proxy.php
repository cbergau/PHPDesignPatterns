<?php
/**
 * Proxy pattern exmaple
 *
 * @author    Christian Bergau <c.bergau@netrada.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Proxy_pattern
 */

interface ProductInterface
{
    public function action();
}

class Product implements ProductInterface
{
    protected $actionCalls = 0;

    public function action()
    {
        $this->actionCalls++;
    }

    public function getActionCalls()
    {
        return $this->actionCalls;
    }
}

class ProductProxy implements ProductInterface
{
    protected $product;
    const ACTION_CALL_LIMITS = 3;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function action()
    {
        if ($this->product->getActionCalls() >= self::ACTION_CALL_LIMITS) {
            throw new Exception('Can not call action more than ' . self::ACTION_CALL_LIMITS);
        }
        $this->product->action();
    }
}

$product = new ProductProxy(new Product());
$product->action();
$product->action();
$product->action();
$product->action(); // Exception will be thrown here