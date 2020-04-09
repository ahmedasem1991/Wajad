<?php

namespace App\Console\Commands;

use App\User;
use App\Corporate;
use Illuminate\Console\Command;

class SeedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        
        Corporate::create([
            'unique_id' => time() . '-WAJAD-Corporate',
            'name_en' => 'WAJAD Corporate',
            'name_ar' => 'مؤسسة وجد',
            'details_en' => 'WAJAD Corporate For Haj & Omra',
            'details_ar' => 'مؤسسة وجد للحج والعمرة', // User
            'address_en' => 'Jadda - KSA',
            'address_ar' => 'جده - المملكة العربية السعودية',
            'latitude' => '21.4498898',
            'longitude' => '39.4913423',
            'status' => 1,
            'image' => 'images/corporates/default-profile.png',
            'end_date' => '2030-01-12 19:15:23',
        ]);



        $this->line('|-------------------------------|');
        $this->line('|------- Superadmin Seed -------|');
        $this->line('|-------------------------------|');

        $username = $this->ask('Superadmin Username', 'Admin');
        $email = $this->ask('Superadmin Email Address', 'admin@wajad.com');
        $password = $this->ask('Superadmin Password', 123456789);

        User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'type' => User::Types['admin'],
            'mobile_number' => '01006994920',
            'mobile_country_id' => 1
        ]);

        $this->line('|----------------------------------|');
        $this->line('|-Superadmin Created Successfully -|');
        $this->line('|----------------------------------|');
        $this->line("|----- Email Address : $email -----|");
        $this->line("|------ Password : $password ------|");
        $this->line('|----------------------------------|');

      
        $this->line('|-------------------------------------|');
        $this->line('|-------- Nova Corporate Seed --------|');
        $this->line('|-------------------------------------|');

        $username = $this->ask('Username', 'Corporate');
        $email = $this->ask('Email Address', 'corporate@wajad.com');
        $password = $this->ask('Password', 123456789);

        User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'type' => User::Types['corporate'],
            'mobile_number' => '+201095781611',
            'corporate_id' => 1,
            'mobile_country_id' => 1
        ]);

        $this->line('|---------------------------------|');
        $this->line('|-Corporate Created Successfully -|');
        $this->line('|---------------------------------|');
        $this->line("|----- Email Address : $email ----|");
        $this->line("|------ Password : $password -----|");
        $this->line('|---------------------------------|');

        $this->line('|--------------------------------|');
        $this->line('|-------- Nova User Seed --------|');
        $this->line('|--------------------------------|');

        $username = $this->ask('Nova User', 'User');
        $email = $this->ask('Nova Email Address', 'user@wajad.com');
        $password = $this->ask('Nova Password', 123456789);


        User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'type' => User::Types['user'],
            'mobile_number' => '01142416124',
            'corporate_id' => 1,
            'mobile_country_id' => 1,
            'is_mobile_number_verified' => 1,
            'posts_number' => 0
        ]);


        $this->line('|---------------------------------|');
        $this->line('|-Nova User Created Successfully -|');
        $this->line('|---------------------------------|');
        $this->line("|----- Email Address : $email ----|");
        $this->line("|------ Password : $password -----|");
        $this->line('|---------------------------------|');


        
        User::create([
            'name' => 'ahmed gamal',
            'email' => 'a@nova.com',
            'password' => bcrypt('123456'),
            'type' => User::Types['user'],
            'mobile_number' => '01143416124',
            'corporate_id' => NULL,
            'mobile_country_id' => 1,
            'is_mobile_number_verified' => 1,
            'posts_number' => 0
        ]);

        User::create([
            'name' => 'Ahmed Samir',
            'email' => 's@s.com',
            'password' => bcrypt('123456789'),
            'type' => User::Types['user'],
            'mobile_number' => '01142516124',
            'corporate_id' => NULL,
            'mobile_country_id' => 1,
            'is_mobile_number_verified' => 1,
            'posts_number' => 0
        ]);
    }
}
