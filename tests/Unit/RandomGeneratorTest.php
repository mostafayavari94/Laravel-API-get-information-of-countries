<?php

namespace Tests\Unit;

use App\Classes\RandomGenerator;
use PHPUnit\Framework\TestCase;

class RandomGeneratorTest extends TestCase
{
    public function test_random_generator() : void
    {
        $generator = new RandomGenerator();
        $this->assertEquals(4,strlen($generator->random()));
    }
}
