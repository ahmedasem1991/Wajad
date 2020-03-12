<?php

namespace App\Services\Filters\Constants;

interface QrcodeConstants
{
    const STATUS = [
        1 => 'In Stock',
        2 => 'Assigned To User',
        3 => 'Assigned To Corporate',
        4 => 'Registered',
        5 => 'Re-Registered',
        6 => 'Expired',
        'In Stock' => 1,
        'Assigned To User' => 2,
        'Assigned To Corporate' => 3,
        'Registered' => 4,
        'Re-Registered' => 5,
        'Expired' => 6,
    ];

    const TYPES = [
        1 => 'Single Assign',
        2 => 'Multi Assign',
        'Single Assign' => 1,
        'Multi Assign' => 2
    ];
}
