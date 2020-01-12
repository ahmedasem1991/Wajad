<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Faker\Factory;
use GuzzleHttp\Client;


class TestController extends Controller
{
    public function  __invoke()
    {
        $client = new Client([
            'base_uri' => 'http://api.wajad.test/api/',
        ]);

        $faker = Factory::create();
        // dd($faker->phoneNumber);

        $response = $client->post(
            'register',
            [
                'json' => [
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => bcrypt('123456789'),
                    'mobile_number' => $faker->phoneNumber,
                    'device_type' => 'ios',
                ]
            ]
        );

        // $this->assertSame(200, $response->getStatusCode());
        $obj = json_decode($response->getBody()->getContents(), true);
        return $obj;
    }
}
