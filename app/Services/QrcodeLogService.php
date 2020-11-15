<?php

namespace App\Services;

use App\QrcodeLog;

class QrcodeLogService{

    public static function LogQrcode($request, $qrcode)
    {
        $lat = $request->lat ?? '21.4498898';
        $lng = $request->lng ?? '39.4913423';
        $location = self::getLocation($lat, $lng);
        $ip = $request->ip ?? '127.0.0.1';
        $device_type = $request->device_type ?? 'web';
       // $log = new QrcodeLog();
        QrcodeLog::firstOrCreate([
            'ip' =>  $ip,
            'location' =>  $location,
            'lat' =>  $lat,
            'lng' => $lng,
            'device_type' => $device_type,
            'qrcode_id' =>  $qrcode->id
            ]);
        
        //$log->ip = $ip;
       // $log->location = $location;
        // $log->lat = $lat;
        // $log->lng = $lng;
        // $log->device_type = $device_type;
        // $log->qrcode_id = $qrcode->id;
        // $log->save();
    }

    protected static function getLocation($lat, $lng)
    {
        return 'https://www.google.com/maps/search/?api=1&query='.$lat.','.$lng;
    }

}
