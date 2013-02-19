<?php
/**
 * Null Object Pattern
 *
 * @author    Ingo Walz
 * @copyright Free for all
 * @link      http://en.wikipedia.org/wiki/Null_Object_pattern
 */

namespace Model
{
    interface BrainInterface
    {
        public function setIQ($iq);
        public function getIQ();
    }
    
    class Brain implements BrainInterface
    {
        protected $iq = null;

        public function getIQ()
        {
            return $this->iq;
        }
        
        public function setIQ($iq)
        {
            $this->iq = $iq;
        }
    }
    
    class NullBrain implements BrainInterface
    {
        public function setIQ($iq)
        {
        }

        public function getIQ()
        {
            return "Sooo low? Really?";
        }
    }
    
    class BrainAdapter
    {
        public function getByNumber($iq)
        {
            if($iq <= 0)
                return new NullBrain();
            
            $brain = new Brain();
            $brain->setIQ($iq);
            
            return $brain;
        }
    }
    
    foreach(array(100, 40, 12, 0 , 30, -4) as $iq) {
        $adapter = new BrainAdapter();
        $brain = $adapter->getByNumber($iq);
        
        echo "Your IQ is: " . $brain->getIQ() . PHP_EOL;
    }
}
