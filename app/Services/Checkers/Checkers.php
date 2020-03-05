<?php

namespace App\Services\Checkers;

trait Checkers
{
    public function checkFor(...$checkers)
    {
        $checkers_result = [];

        foreach ($checkers as $checker) {
            $checker->checkFor($this) ?: array_push($checkers_result, $checker->checkFor($this));
        }

        return !(bool) count($checkers_result);
    }
}
