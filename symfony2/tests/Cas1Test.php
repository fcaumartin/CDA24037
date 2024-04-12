<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class Cas1Test extends TestCase
{
    public function testCas1(): void
    {
        $a = 2;
        $b = 5;
        $c = $a + $b;


        $this->assertTrue($c === 7);
    }

    // public function testCas2(): void
    // {
    //     $a = 2;
    //     $b = 5;
    //     $c = $a - $b;


    //     $this->assertTrue($c === 45);
    // }

    public function testCas3(): void
    {
        $a = 2;
        $b = 5;
        $c = $a - $b;


        $this->assertTrue($c === -3);
    }
}
