<?php

namespace App\Nova\Metrics;

use App\Corporate ;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class Corporates extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, Corporate::class, 'status')
        ->label(function ($value) {
            switch ($value) {
                case 1:
                    return 'Active';
                case 0:
                    return 'Not Active';
                
                default:
                    return ucfirst($value);
            }
        });
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'status';
    }
}
