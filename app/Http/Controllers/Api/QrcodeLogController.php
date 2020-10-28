<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QrcodeLogResource;
use App\QrcodeLog;
use Illuminate\Http\Request;

/**
 * @group QR Codes
 */
class QrcodeLogController extends Controller
{
    /**
     * Get All QR Code Log
     * @response
     * {
     *  "data": [
     *   {
     *   "id": 1,
     *   "ip": "192.168.10.1",
     *   "location": "https://www.google.com/maps/search/?api=1&query=,",
     *   "lat": null,
     *   "lng": null,
     *   "device_type": "",
     *   "qrcode": {
     *   "id": 1,
     *   "url": "http://api.wajad.test/api/scan-qr-code/111",
     *   "image": null,
     *   "type": "Single Assign",
     *   "status": "Assigned To User",
     *   "unique_reference_number": "dghdfghdfgh",
     *   "generate_reference_number": "dfghdfghdfghdfg",
     *   "assign_reference_number": "U-2020827-132023",
     *   "name": null,
     *   "user": null,
     *   "item": {
     *   "id": 1,
     *   "title": "vebvrebrbrb",
     *   "details": "This is a lost item, please do anything",
     *   "deleted_at": "",
     *   "status": "found",
     *   "owner": {
     *   "id": 12,
     *   "name": "tarek solaiman",
     *   "email": "t@t.com",
     *   "status": 1,
     *   "mobile_number": "1063044180",
     *   "mobile_country_id": 64,
     *   "mobile_country_code": "20",
     *   "receive_emails": false,
     *   "receive_push_notifications": false,
     *   "is_email_verified": false,
     *   "is_mobile_number_verified": false,
     *   "default_distance_unit": "kilo",
     *   "quick_user_id": null,
     *   "quick_user_email": "t@t.com",
     *   "quick_user_password": null,
     *   "image": "http://wajad.test/images/profile/default-profile.png",
     *   "country": {
     *   "id": 64,
     *   "name_ar": "مصر",
     *   "name_en": "Egypt",
     *   "iso_code": "EG",
     *   "country_code": "20",
     *   "deleted_at": null,
     *   "created_at": null,
     *   "updated_at": null
     *   }
     *   },
     *   "subcategory": {
     *   "id": 1,
     *   "name": "Blouse",
     *   "description": null,
     *   "image": "http://wajad.test//images/default.png"
     *   },
     *   "model": {
     *   "id": 1,
     *   "name": "Dell XPS 13",
     *   "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD",
     *   "image": "http://wajad.test//images/posts/post3.jpg"
     *   },
     *   "color": {
     *   "id": 1,
     *   "name": "Red",
     *   "icon": "images/profile/default-profile.png"
     *   },
     *   "brand": {
     *   "id": 1,
     *   "name": "LCWIKIKI",
     *   "description": "",
     *   "image": "http://wajad.test//images/posts/post7.jpg"
     *   },
     *   "attached_to_qrcode": true,
     *   "date": "2020-01-28 13:19:48",
     *   "images": [
     *   "/images//0x0jiU7iCh0MfXc.png",
     *   "/images//0x0jiU7iCh0MfXc.png",
     *   "/images//0x0jiU7iCh0MfXc.png"
     *   ]
     *   },
     *   "post": {
     *   "id": 1,
     *   "title": "sfgsdfg",
     *   "approval_status": 1,
     *   "longitude": 39.4913431,
     *   "latitude": 21.4498898,
     *   "reward": "1",
     *   "description": "sdfgsdfgsdfg",
     *   "status": "found",
     *   "attached_to_item": true,
     *   "sub_category": {
     *   "id": 1,
     *   "name": "Blouse",
     *   "description": null,
     *   "image": "http://wajad.test//images/default.png"
     *   },
     *   "model": {
     *   "id": 1,
     *   "name": "Dell XPS 13",
     *   "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD",
     *   "image": "http://wajad.test//images/posts/post3.jpg"
     *   },
     *   "brand": {
     *   "id": 1,
     *   "name": "LCWIKIKI",
     *   "description": "",
     *   "image": "http://wajad.test//images/posts/post7.jpg"
     *   },
     *   "color": {
     *   "id": 1,
     *   "name": "Red",
     *   "icon": "images/profile/default-profile.png"
     *   },
     *   "date": null,
     *   "images": [
     *   "/images/screenshot-from-2020-08-26-16-08-02-1599649865-vqZeC.png"
     *   ],
     *   "questions": [
     *   {
     *   "id": 1,
     *   "question": "sdfsdf",
     *   "answer": null
     *   },
     *   {
     *   "id": 2,
     *   "question": "sdfsdf",
     *   "answer": null
     *   },
     *   {
     *   "id": 3,
     *   "question": "sdfsdf",
     *   "answer": null
     *   }
     *   ],
     *   "claimers": [
     *   {
     *   "questions": [
     *   {
     *   "id": 1,
     *   "question": "sdfsdf",
     *   "answer": null
     *   },
     *   {
     *   "id": 2,
     *   "question": "sdfsdf",
     *   "answer": null
     *   },
     *   {
     *   "id": 3,
     *   "question": "sdfsdf",
     *   "answer": null
     *   }
     *   ],
     *}
     * @return object
     */
    public function index()
    {
        return QrcodeLogResource::collection(QrcodeLog::all());
    }

    /**
     * Get Single QR Code Log
     * @urlParam qrcode_id int required exists in qrcodes,id
     * @response
     * {
     *  "data": [
     *      {
     *      "id": 1,
     *      "ip": "192.168.10.1",
     *      "location": "https://www.google.com/maps/search/?api=1&query=,",
     *      "lat": null,
     *      "lng": null,
     *      "device_type": "",
     *      "qrcode": {
     *      "id": 1,
     *      "url": "http://api.wajad.test/api/scan-qr-code/111",
     *      "image": null,
     *      "type": "Single Assign",
     *      "status": "Assigned To User",
     *      "unique_reference_number": "dghdfghdfgh",
     *      "generate_reference_number": "dfghdfghdfghdfg",
     *      "assign_reference_number": "U-2020827-132023",
     *      "name": null,
     *      "user": null,
     *      "item": {
     *      "id": 1,
     *      "title": "vebvrebrbrb",
     *      "details": "This is a lost item, please do anything",
     *      "deleted_at": "",
     *      "status": "found",
     *      "owner": {
     *      "id": 12,
     *      "name": "tarek solaiman",
     *      "email": "t@t.com",
     *      "status": 1,
     *      "mobile_number": "1063044180",
     *      "mobile_country_id": 64,
     *      "mobile_country_code": "20",
     *      "receive_emails": false,
     *      "receive_push_notifications": false,
     *      "is_email_verified": false,
     *      "is_mobile_number_verified": false,
     *      "default_distance_unit": "kilo",
     *      "quick_user_id": null,
     *      "quick_user_email": "t@t.com",
     *      "quick_user_password": null,
     *      "image": "http://wajad.test/images/profile/default-profile.png",
     *      "country": {
     *      "id": 64,
     *      "name_ar": "مصر",
     *      "name_en": "Egypt",
     *      "iso_code": "EG",
     *      "country_code": "20",
     *      "deleted_at": null,
     *      "created_at": null,
     *      "updated_at": null
     *      }
     *      },
     *      "subcategory": {
     *      "id": 1,
     *      "name": "Blouse",
     *      "description": null,
     *      "image": "http://wajad.test//images/default.png"
     *      },
     *      "model": {
     *      "id": 1,
     *      "name": "Dell XPS 13",
     *      "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD",
     *      "image": "http://wajad.test//images/posts/post3.jpg"
     *      },
     *      "color": {
     *      "id": 1,
     *      "name": "Red",
     *      "icon": "images/profile/default-profile.png"
     *      },
     *      "brand": {
     *      "id": 1,
     *      "name": "LCWIKIKI",
     *      "description": "",
     *      "image": "http://wajad.test//images/posts/post7.jpg"
     *      },
     *      "attached_to_qrcode": true,
     *      "date": "2020-01-28 13:19:48",
     *      "images": [
     *      "/images//0x0jiU7iCh0MfXc.png",
     *      "/images//0x0jiU7iCh0MfXc.png",
     *      "/images//0x0jiU7iCh0MfXc.png"
     *      ]
     *      },
     *      "post": {
     *      "id": 1,
     *      "title": "sfgsdfg",
     *      "approval_status": 1,
     *      "longitude": 39.4913431,
     *      "latitude": 21.4498898,
     *      "reward": "1",
     *      "description": "sdfgsdfgsdfg",
     *      "status": "found",
     *      "attached_to_item": true,
     *      "sub_category": {
     *      "id": 1,
     *      "name": "Blouse",
     *      "description": null,
     *      "image": "http://wajad.test//images/default.png"
     *      },
     *      "model": {
     *      "id": 1,
     *      "name": "Dell XPS 13",
     *      "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD",
     *      "image": "http://wajad.test//images/posts/post3.jpg"
     *      },
     *      "brand": {
     *      "id": 1,
     *      "name": "LCWIKIKI",
     *      "description": "",
     *      "image": "http://wajad.test//images/posts/post7.jpg"
     *      },
     *      "color": {
     *      "id": 1,
     *      "name": "Red",
     *      "icon": "images/profile/default-profile.png"
     *      },
     *      "date": null,
     *      "images": [
     *      "/images/screenshot-from-2020-08-26-16-08-02-1599649865-vqZeC.png"
     *      ],
     *      "questions": [
     *      {
     *      "id": 1,
     *      "question": "sdfsdf",
     *      "answer": null
     *      },
     *      {
     *      "id": 2,
     *      "question": "sdfsdf",
     *      "answer": null
     *      },
     *      {
     *      "id": 3,
     *      "question": "sdfsdf",
     *      "answer": null
     *      }
     *      ],
     *      "claimers": [
     *      {
     *      "questions": [
     *      {
     *      "id": 1,
     *      "question": "sdfsdf",
     *      "answer": null
     *      },
     *      {
     *      "id": 2,
     *      "question": "sdfsdf",
     *      "answer": null
     *      },
     *      {
     *      "id": 3,
     *      "question": "sdfsdf",
     *      "answer": null
     *      }
     *      ],
     *}
     * @return object
     */
    public function show($qrcode_id)
    {
        $log = QrcodeLog::where('qrcode_id',$qrcode_id)->get();
        return QrcodeLogResource::collection($log);
    }
}
