<?php

namespace App\Nova\Metrics;

use App\Post;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class Posts extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, Post::class, 'appearance_status')
        ->label(function ($value) {
            switch ($value) {
                case 1:
                    return 'Show';
                case 0:
                    return 'Hidden';
                default:
                    return ucfirst($value);
            }
        });
        
        ;
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
        return 'posts';
    }
}
