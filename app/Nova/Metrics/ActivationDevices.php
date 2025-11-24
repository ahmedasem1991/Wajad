<?php

namespace App\Nova\Metrics;

use App\DeviceType;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class ActivationDevices extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, DeviceType::class, 'device_type')
            ->label(function ($value) {
                switch ($value) {
                    case 'ios':
                        return 'IOS';
                    case 'android':
                        return 'ANDROID';
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
        return 'activation-devices';
    }
}
