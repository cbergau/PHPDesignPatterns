<?php
/**
 * Command pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @package   PHPDesignPatterns
 * @link      http://en.wikipedia.org/wiki/Command_pattern
 */

class Invoker
{
    protected $commands = array();

    public function addCommand($name, $commands)
    {
        $this->commands[$name] = $commands;
    }

    public function executeCommands($name, Receiver $receiver)
    {
        if (!isset($this->commands[$name])) {
            throw new Exception('Invalid name');
        }
        foreach ($this->commands[$name] as $command) {
            $command->execute($receiver);
        }
    }
}

interface CommandInterface
{
    public function execute(Receiver $receiver);
}

class FirstConcreteCommand implements CommandInterface
{
    public function execute(Receiver $receiver)
    {
        echo "First command on ".$receiver->getName();
    }
}

class SecondConcreteCommand implements CommandInterface
{
    public function execute(Receiver $receiver)
    {
        echo "Second command on ".$receiver->getName();
    }
}

class Receiver
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$invoker = new Invoker();
$invoker->addCommand(
    'standard',
    array(
        new FirstConcreteCommand(),
    )
);

$invoker->addCommand(
    'deluxe',
    array(
        new FirstConcreteCommand(),
        new SecondConcreteCommand()
    )
);

$someReceiver = new Receiver('ReceiverOne');
$invoker->executeCommands('standard', $someReceiver);

$anotherReceiver = new Receiver('ReceiverTwo');
$invoker->executeCommands('deluxe', $anotherReceiver);
