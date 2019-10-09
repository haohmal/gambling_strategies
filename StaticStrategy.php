<?php


namespace App;

require_once ('Gamer.php');


class StaticStrategy extends Gamer {

    public function nextRound() : bool
    {
        if ($this->money <= 0) {
            //echo "No money left. Gamer lost everything :(";
            $this->stake = 0;
            return false;
        }
        else {
            $this->money -=1;
            $this->stake = 1;
        }
        //echo "I will bet $this->stake in this round.";
        return true;
    }
}