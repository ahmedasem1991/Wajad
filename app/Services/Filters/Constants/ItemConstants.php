<?php

namespace App\Services\Filters\Constants;

interface ItemConstants
{
    const STATUS = [
        0 => 'lost',
        1 => 'found',
        2 => 'mine',
        'lost' => 0,
        'found' => 1,
        'mine' => 2
    ];
}
