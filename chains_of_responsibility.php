<?php
/**
 * Chain of Responsibility pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @link      http://en.wikipedia.org/wiki/Chain-of-responsibility_pattern
 */

abstract class Logger
{
    const ERR    = 3;
    const NOTICE = 5;
    const DEBUG  = 7;
    protected $mask;

    /**
     * @var Logger
     */
    protected $next;

    public function __construct($mask)
    {
        $this->mask = $mask;
    }

    public function setNext(Logger $log)
    {
        $this->next = $log;
    }

    public function message($msg, $priority)
    {
        if ($priority <= $this->mask) {
            $this->writeMessage($msg);
        }

        if ($this->next != null) {
            $this->next->message($msg, $priority);
        }
    }

    abstract protected function writeMessage($msg);
}

class StdoutLogger extends Logger
{
    protected function writeMessage($msg)
    {
        echo 'Sending to Stdout: ' . $msg . PHP_EOL;
    }
}


class EmailLogger extends Logger
{
    protected function writeMessage($msg)
    {
        echo "Sending via email: " . $msg . PHP_EOL;
    }
}

class StderrLogger extends Logger
{
    protected function writeMessage($msg)
    {
        echo "Sending to stderr: " . $msg . PHP_EOL;
    }
}

// Create the chain
$chainLogger = new StdoutLogger(Logger::DEBUG);
$emailLogger = new EmailLogger(Logger::NOTICE);
$chainLogger->setNext($emailLogger);
$emailLogger->setNext(new StderrLogger(Logger::ERR));

$chainLogger->message("Entering function y.", Logger::DEBUG);
$chainLogger->message("Step1 completed.", Logger::NOTICE);
$chainLogger->message("An error has occurred.", Logger::ERR);
