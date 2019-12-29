<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Factory;
use GuzzleHttp\Client;

class SeedTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guzzel:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test guzzel ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client([
            'base_uri' => 'https://ddo1.mideastsoft.com/',
        ]);

        $faker = Factory::create();
        // dd($faker->phoneNumber);

        for ($i = 0; $i < 10000; $i++) {
            $password = $faker->password;
            $response = $client->post(
                'mobapp/apiRegister',
                [
                    'json' => [
                        'firstname' => $faker->name,
                        'lastname' => $faker->name,
                        'email' => $faker->email,
                        'pass' =>   $password,
                        'confirmPass' => $password,
                        'birthdateYear' => rand(1970, 2010),
                        'birthdateMonth' => rand(1, 12),
                        'birthdateDay' => rand(1, 30),
                        'phone' => rand(10000000, 99999999),
                        'termsOfServices' => 'on',
                        'countryCode' => '002010',
                    ]
                ]
            );
            echo $i . " " . $faker->email . "  ";
        }

        // $this->assertSame(200, $response->getStatusCode());
        $obj = json_decode($response->getBody()->getContents(), true);
        return $obj;
    }
}
