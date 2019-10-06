<?php


namespace App;


class ReverseMartingale extends Gamer {

    public function nextRound() : bool
    {
        if ($this->money <= 0) {
            //echo "No money left. Gamer lost everything :(";
            $this->stake = 0;
            return false;
        } elseif ($this->history >= 5 || $this->history <=0) {
            $this->money -=1;
            $this->stake = 1;
        } elseif ($this->money >= 2 ** abs($this->history)) {
            $this->stake = 2 ** abs($this->history);
            $this->money -= 2 ** abs($this->history);
        } else {
            $this->stake = $this->money;
            $this->money = 0;
        }
        //echo "I will bet $this->stake in this round.";
        return true;
    }
}