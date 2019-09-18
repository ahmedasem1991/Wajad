<?php

namespace App\Nova\Metrics;
use App\User;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class UsersTypes extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, User::class, 'type','status')
        ->label(function ($value) {
            switch ($value) {
                case 1:
                    return 'Clients';
                case 2:
                    return 'Corporates';
                case 3:
                    return 'Admins';
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
        return 'users-types';
    }
}
