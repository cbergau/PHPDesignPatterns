<?php
/**
 * NullObject pattern example
 *
 * @author    Christian Bergau <c.bergau@netrada.com>
 * @copyright Free for all
 * @link      https://en.wikipedia.org/wiki/Null_Object_pattern
 */

interface Employee
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return double
     */
    public function getSalary();
}

class EmployeeImpl implements Employee
{
    private $id;
    private $name;
    private $salary;

    /**
     * @param int    $id
     * @param string $name
     * @param double $salary
     */
    public function __construct($id, $name, $salary)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

// THIS IS THE NULL OBJECT:

class NullEmployee implements Employee
{
    public function getId()
    {
        return 0;
    }

    public function getName()
    {
        return '';
    }

    public function getSalary()
    {
        return 0.0;
    }
}
