<?php

namespace App\Console\Commands;

use App\User;
use App\Banner;
use App\Corporate;
use App\WajadOffice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class SeedApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application';

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
        Artisan::call('migrate:fresh');

        $this->info('Database Migrated Successfully');

        $this->info('Create Nova Admin');
        $username = $this->ask('Username', 'Admin');
        $email = $this->ask('Email Address', 'admin@nova.com');
        $password = $this->ask('Password', 123456789);
        User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'type' => 3, // Admin
            'mobile_number' => '01111086890',
            'mobile_country_id' => 1
        ]);
        $this->info('Nova Admin Created Successfully');

        $this->info('Create Nova User');
        $username = $this->ask('Username', 'User');
        $email = $this->ask('Email Address', 'user@nova.com');
        $password = $this->ask('Password', 123456789);
        User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'type' => 1, // User
            'mobile_number' => '01142416124',
            'corporate_id' => 1,
            'mobile_country_id' => 1,
            'posts_limitation' => 50
        ]);
        $this->info('Nova User Created Successfully');


        $this->info('Create Nova Corporate Admin');
        $username = $this->ask('Username', 'Corporate');
        $email = $this->ask('Email Address', 'corporate@nova.com');
        $password = $this->ask('Password', 123456789);
        User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'type' => 2, // Corporate
            'mobile_number' => '+201095781611',
            'corporate_id' => 1,
            'mobile_country_id' => 1
        ]);
        Corporate::create([
            'name_en' => 'WAJAD Corporate',
            'name_ar' => 'مؤسسة وجد',
            'details_en' => 'WAJAD Corporate For Haj & Omra',
            'details_ar' => 'مؤسسة وجد للحج والعمرة', // User
            'address_en' => 'Jadda - KSA',
            'address_ar' => 'جده - المملكة العربية السعودية',
            'latitude' => '21.4498898',
            'longitude' => '39.4913423',
            'status' => 1,

        ]);
        $this->info('Nova Corporate Admin Created Successfully');


         /**---------------------------------------------*\
        |                 Seed Roles                     |
        \-----------------------------------------------*/
        // Seeed Countries
        $this->info( 'Seed Roles' );
        $path = 'app/developer_docs/roles.sql';
        DB::unprepared( file_get_contents($path) );
        $path = 'app/developer_docs/permissions.sql';
        DB::unprepared( file_get_contents($path) );
        $path = 'app/developer_docs/role_user.sql';
        DB::unprepared( file_get_contents($path) );

        $this->info( 'Seed Roles and permissions Successfully' );
        Artisan::call('seed:locations');
        Artisan::call('seed:settings');

        $create_banner_question = $this->ask('Banner Number ?', 5);

        factory(Banner::class, (int) $create_banner_question)->create();

        $create_wajad_offices_question = $this->ask('Count Wajad Offices', 5);

        factory(WajadOffice::class, (int) $create_wajad_offices_question)->create();
    }
}
