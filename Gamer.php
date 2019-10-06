<?php

namespace App;

interface GamingStrategy {
    public function nextRound();
}

abstract class Gamer implements GamingStrategy {
    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    protected $money;
    protected $history;
    protected $stake;
    protected $optional;

    public function __construct()
    {
        $this->money = 1024;
        $this->history = 0;
        $this->stake = 0;
    }

    public function loose()
    {
        //echo "I lost\n";
        if ($this->history > 0) {
            $this->history = 0;
        } else {
            $this->history -= 1;
        }
    }

    public function win()
    {
        //echo "I won!\n";
        if ($this->history < 0) {
            $this->history = 1;
        } else {
            $this->history += 1;
        }
        $this->money += ($this->stake * 2);
    }
}