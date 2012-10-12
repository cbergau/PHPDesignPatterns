<?php
/**
 * Decorator pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Strategy_pattern
 */

interface StrategyInterface
{
    public function algorithm();
}

class FirstConcreateStrategy implements StrategyInterface
{
    public function algorithm()
    {
        echo 'first strategy algorithm';
    }
}

class SecondConcreateStrategy implements StrategyInterface
{
    public function algorithm()
    {
        echo 'second strategy algorithm';
    }
}

class Context
{
    protected $strategy;

    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy()
    {
        return $this->strategy->algorithm();
    }
}

$context = new Context(new FirstConcreateStrategy());
$context->executeStrategy();

$context = new Context(new SecondConcreateStrategy());
$context->executeStrategy();
