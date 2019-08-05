<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\User;

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

        $this->info('Create Nova User');
        $username = $this->ask('Username', 'Admin');
        $email = $this->ask('Email Address', 'admin@nova.com');
        $password = $this->ask('Password', 123456789);
        User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'type' => 3 // Admin
        ]);
        $this->info('Nova User Created Successfully');

        
    }
}
