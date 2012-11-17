<?php
/**
 * Template method pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Template_method
 */

abstract class Product
{
    abstract public function actionOne();
    abstract public function actionTwo();
    abstract public function actionThree();

    public function doTheActions()
    {
        $this->actionOne();
        $this->actionTwo();
        $this->actionThree();
    }
}

class ConcreteProductA extends Product
{
    public function actionOne()
    {
        // Implement actionOne for ProductA which can be a little different to other products implementation
    }

    public function actionTwo()
    {
        // Implement actionTwo for ProductA which can be a little different to other products implementation
    }

    public function actionThree()
    {
        // Implement actionThree for ProductA which can be a little different to other products implementation
    }
}

class ConcreteProductB extends Product
{
    public function actionOne()
    {
        // Implement actionOne for ProductB which can be a little different to other products implementation
    }

    public function actionTwo()
    {
        // Implement actionTwo for ProductB which can be a little different to other products implementation
    }

    public function actionThree()
    {
        // Implement actionThree for ProductB which can be a little different to other products implementation
    }
}

