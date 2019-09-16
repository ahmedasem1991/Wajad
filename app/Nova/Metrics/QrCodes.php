<?php

namespace App\Nova\Metrics;

use App\Qrcodes as AppQrcodes;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class QrCodes extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, AppQrcodes::class, 'item_id')
        ->label(function ($value) {
            switch ($value) {
                case NULL:
                    return 'Unused';
                case $value !=Null:
                    return 'Used';
                
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
        return 'qr-codes';
    }
}
