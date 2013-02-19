<?php
/**
 * Memento pattern example
 *
 * @author    Christian Bergau <c.bergau@netrada.com>
 * @copyright Free for all
 * @link      http://en.wikipedia.org/wiki/Memento_pattern
 */

class Originator
{
    protected $state = '';

    public function setState($state)
    {
        echo 'Originator: Setting state to: ' . $state . PHP_EOL;
        $this->state = $state;
    }

    public function saveToMemento()
    {
        return new Memento($this->state);
    }

    public function restoreFromMemento(Memento $memento)
    {
        $this->state = $memento->getSavedState();
        echo "Originator: State after restoring from Memento: " . $this->state . PHP_EOL;
    }
}

class Memento
{
    protected $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function getSavedState()
    {
        return $this->state;
    }
}

class Caretaker
{
    public function doIt()
    {
        $savedStates = array();

        $originator = new Originator();
        $originator->setState('StateOne');
        $savedStates[] = $originator->saveToMemento();
        $originator->setState('StateTwo');
        $savedStates[] = $originator->saveToMemento();
        $originator->setState('StateThree');
        $originator->restoreFromMemento($savedStates[1]);
    }
}

$careTaker = new Caretaker();
$careTaker->doIt();