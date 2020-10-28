<?php

namespace App\Services;

use App\QrcodeLog;

class QrcodeLogService{

    public static function LogQrcode($request, $qrcode)
    {
        $lat = $request->lat ?? '30.1545585';
        $lng = $request->lng ?? '30.15245525';
        $location = self::getLocation($lat, $lng);
        $ip = $_SERVER['REMOTE_ADDR'];
        $device_type = $request->device_type ?? 'web';
        $log = new QrcodeLog();
        $log->ip = $ip;
        $log->location = $location;
        $log->lat = $lat;
        $log->lng = $lng;
        $log->device_type = $device_type;
        $log->qrcode_id = $qrcode->id;
        $log->save();
    }

    protected static function getLocation($lat, $lng)
    {
        return 'https://www.google.com/maps/search/?api=1&query='.$lat.','.$lng;
    }

}
