<?php

namespace App\NovaCorporate\Metrics;

use App\Post;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class OpenVsClosedPosts extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, Post::where('corporate_id', Auth()->user()->corporate->id), 'open_status')
            ->label(function ($value) {
                switch ($value) {
                    case 1:
                        return 'Open';
                    case 0:
                        return 'Close';
                    default:
                        return ucfirst($value);
                }
            });

    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int
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
        return 'opening_vs_closed_posts';
    }
}
