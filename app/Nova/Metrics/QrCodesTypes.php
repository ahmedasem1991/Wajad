<?php

namespace App\Nova\Metrics;

use App\Qrcode as AppQrcodes;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class QrCodesTypes extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, AppQrcodes::where('status', 1), 'type')
            ->label(function ($value) {
                switch ($value) {
                    case 1:
                        return 'Single Assign';
                    case 2:
                        return 'Multi Assign';

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
        return 'qr-codes-types';
    }

    public function name()
    {
        return 'Free QR Codes Types';
    }
}
