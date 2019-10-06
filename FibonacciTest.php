<?php

namespace App;

require_once  ('Gamer.php');
require_once ('Fibonacci.php');


use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{

    public function testFibonacci()
    {

        $gamer = new Fibonacci();
        $this->assertEquals(1, $gamer->fibonacci(1));
        $this->assertEquals(1, $gamer->fibonacci(2));
        $this->assertEquals(2, $gamer->fibonacci(3));
        $this->assertEquals(3, $gamer->fibonacci(4));
        $this->assertEquals(55, $gamer->fibonacci(10));
    }
}
