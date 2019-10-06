<?php

namespace App;

class Fibonacci extends Gamer {

    public function __construct()
    {
        parent::__construct();
        $this->optional = 0;
    }

    public function fibonacci($step) :int {
        if ($step <= 2) {
            return 1;
        } else {
            return $this->fibonacci($step - 1) + $this->fibonacci($step - 2);
        }
    }

    public function win()
    {
        if ($this->optional > 3) {
            $this->optional -= 2;
        } else {
            $this->optional = 1;
        }
        parent::win();
    }

    public function loose()
    {
        $this->optional += 1;
        parent::loose();
    }

    public function nextRound() : bool
    {
        if ($this->money <= 0) {
            //echo "No money left. Gamer lost everything :(";
            $this->stake = 0;
            return false;
        }
        elseif ($this->money >= $this->fibonacci($this->optional)) {
            $this->money -= $this->fibonacci($this->optional);
            $this->stake = $this->fibonacci($this->optional);
        } else {
            $this->stake = $this->money;
            $this->money = 0;
        }
        //echo "I will bet $this->stake in this round.";
        return true;
    }
}
