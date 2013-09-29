<?php
/**
 * Observer pattern example
 *
 * @author    Daniel Basten <axhm3a@gmail.com>
 * @copyright Free for all
 * @author    Design Patterns. Elements of Reusable Object-Oriented Software.
 *            Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides
 */

interface Visitor
{
    /**
     * @param ConcreteElementA $concreteElementA
     * @return void
     */
    public function VisitA(ConcreteElementA $concreteElementA);

    /**
     * @param ConcreteElementB $concreteElementB
     * @return void
     */
    public function VisitB(ConcreteElementB $concreteElementB);
}

class concreteVisitorA implements Visitor
{
    /**
     * @param ConcreteElementA $concreteElementA
     */
    public function VisitA(ConcreteElementA $concreteElementA)
    {
        $concreteElementA->setCounter(
            $concreteElementA->getCounter() + 1
        );
    }

    /**
     * @param ConcreteElementB $concreteElementB
     */
    public function VisitB(ConcreteElementB $concreteElementB)
    {
        $concreteElementB->setName(
            'visited ' . $concreteElementB->getName()
        );
    }
}

class concreteVisitorB implements Visitor
{
    /**
     * @param ConcreteElementA $concreteElementA
     */
    public function VisitA(ConcreteElementA $concreteElementA)
    {
        echo 'counter: ' . $concreteElementA->getCounter() . PHP_EOL;
    }

    /**
     * @param ConcreteElementB $concreteElementB
     */
    public function VisitB(ConcreteElementB $concreteElementB)
    {
        echo 'name: ' . $concreteElementB->getName() . PHP_EOL;
    }
}

interface Element
{
    /**
     * @param Visitor $visitor
     * @return void
     */
    public function host(Visitor $visitor);
}

class ConcreteElementA implements Element
{
    /**
     * @var int
     */
    private $counter = 0;

    /**
     * @param Visitor $visitor
     * @return void
     */
    public function host(Visitor $visitor)
    {
        $visitor->VisitA($this);
    }

    /**
     * @param int $counter
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
    }

    /**
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }
}

class ConcreteElementB implements Element
{
    /**
     * @var string
     */
    private $name = 'neat FooBar Object';

    /**
     * @param Visitor $visitor
     * @return void
     */
    public function host(Visitor $visitor)
    {
        $visitor->VisitB($this);
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

$concreteElementA = new ConcreteElementA();
$concreteElementB = new ConcreteElementB();

// this one changes object's data
$concreteVisitorA = new concreteVisitorA();

// this one outputs the object's data
$concreteVisitorB = new concreteVisitorB();

// let modifying visitors run
$concreteElementA->host($concreteVisitorA);
$concreteElementB->host($concreteVisitorA);

// now our reading visitors
$concreteElementA->host($concreteVisitorB);
$concreteElementB->host($concreteVisitorB);