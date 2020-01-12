<?php

namespace App\Nova\Metrics;

use App\Brand;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Value;

class Brands extends Value
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        //return $this->count($request, Brand::class);
        return $this->result(Brand::count());
        
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        // return [
        //     15 => '10 Days',
        //     30 => '30 Days',
        //     60 => '60 Days',
        //     90 => '90 Days',
        // ];
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
        return 'brands';
    }
}
