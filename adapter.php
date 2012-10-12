<?php
/**
 * Object adapter example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Adapter_pattern
 */

class Adaptee
{
    public function methodB()
    {
        echo 'MethodB called';
    }
}

class Adaptor
{
    protected $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function methodA()
    {
        $this->adaptee->methodB();
    }
}

class Client
{
    protected $adaptor;

    public function __construct(Adaptor $adaptor)
    {
        $this->adaptor = $adaptor;
    }

    public function doWork()
    {
        $this->adaptor->methodA();
    }
}

$client = new Client(new Adaptor(new Adaptee()));
$client->doWork();
