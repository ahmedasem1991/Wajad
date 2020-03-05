<?php

namespace App\Services\Checkers;

trait Checkers
{
    public function checkFor(...$checkers)
    {
        foreach ($checkers as $checker) {
            $checker->checkFor();
        }
    }
}
