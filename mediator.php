<?php
/**
 * Mediator pattern example
 *
 * @author    Daniel Basten <axhm3a@gmail.com>
 * @copyright Free for all
 * @author    Design Patterns. Elements of Reusable Object-Oriented Software.
 *            Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides
 */

abstract class Mediator
{
    /**
     * @var Colleague[]
     */
    protected $colleagues = array();

    /**
     * @param Colleague $colleague
     */
    public function addColleague(Colleague $colleague)
    {
        $this->colleagues[] = $colleague;
    }

    /**
     * @param string $message
     * @param Colleague $subject
     * @return void
     */
    abstract public function send($message, Colleague $subject);
}

abstract class Colleague
{
    /**
     * @var Mediator
     */
    private $mediator;

    /**
     * @param Mediator $mediator
     */
    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
        $this->mediator->addColleague($this);
    }

    /**
     * @param string $message
     */
    public function send($message)
    {
        $this->mediator->send($message, $this);
    }

    /**
     * @param string $message
     * @return void
     */
    public abstract function receive($message);
}

class ConcreteMediator extends Mediator
{
    /**
     * @param string $message
     * @param Colleague $sender
     * @return void
     */
    public function send($message, Colleague $sender)
    {
        foreach($this->colleagues as $colleague) {
            if ($colleague !== $sender) {
                $colleague->receive($message);
            }
        }
    }
}

class ConcreteColleagueA extends Colleague
{
    /**
     * @param string $message
     * @return void
     */
    public function receive($message)
    {
        echo "ConcreteColleagueA received $message" . PHP_EOL;
    }
}

class ConcreteColleagueB extends Colleague
{
    /**
     * @param string $message
     * @return void
     */
    public function receive($message)
    {
        echo "ConcreteColleagueB got $message" . PHP_EOL;
    }
}

$mediator = new ConcreteMediator();

$colleagueA = new ConcreteColleagueA($mediator);
$colleagueB = new ConcreteColleagueB($mediator);
$colleagueC = new ConcreteColleagueA($mediator);

$colleagueA->send('Hello World');
$colleagueB->send('Hello Moon');