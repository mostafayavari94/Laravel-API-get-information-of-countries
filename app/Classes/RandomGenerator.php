<?php

namespace App\Classes;

class RandomGenerator
{
    public function random(): string
    {
        return rand(1999, 9999);
    }
}
