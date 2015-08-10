<?php
/**
 * Chain of Responsibility pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @link      https://en.wikipedia.org/wiki/Singleton_pattern
 */

class Singleton
{
    /**
     * @var Singleton
     */
    protected static $instance;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    /**
     * @return Singleton
     */
    public static function getInstance()
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}

$s = Singleton::getInstance();
var_dump($s);
