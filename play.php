<?php

require_once ('StaticStrategy.php');
require_once ('Martingale.php');
require_once ('ReverseMartingale.php');
require_once ('Fibonacci.php');

use App\Fibonacci;
use App\Martingale;
use App\ReverseMartingale;
use App\StaticStrategy;

$gamer = array (new StaticStrategy(), new Martingale(), new ReverseMartingale(), new Fibonacci());
//echo "Money: ".$gamer->getMoney();
echo "<table><tr><th>Static</th><th>Martingale</th><th>Reverse Martingale</th><th>Fibonacci</th></tr>";
for ($i=0; $i<1000; $i++) {
    if ($gamer[0]->nextRound() | $gamer[1]->nextRound() | $gamer[2]->nextRound() | $gamer[3]->nextRound()) {
        try {
            if (random_int(1, 100) <= 45) {
                $gamer[0]->win();
                $gamer[1]->win();
                $gamer[2]->win();
                $gamer[3]->win();
            } else {
                $gamer[0]->loose();
                $gamer[1]->loose();
                $gamer[2]->loose();
                $gamer[3]->loose();
            }
        } catch (Exception $e) {
            echo "random_int function throws the following exception " . $e;
            exit(1);
        }
        echo "<tr><td>".$gamer[0]->getMoney()."</td><td>".$gamer[1]->getMoney()."</td><td>".$gamer[2]->getMoney()."</td><td>".$gamer[3]->getMoney()."</td></tr>";
    } else {
        break;
    }
}
echo "</table>";
echo "Money: ".$gamer[0]->getMoney();
echo "Money: ".$gamer[1]->getMoney();
echo "Money: ".$gamer[2]->getMoney();
echo "Money: ".$gamer[3]->getMoney();
