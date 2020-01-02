<?php

namespace App\Console\Commands;

use App\Item;
use App\Post;
use App\User;
use App\Banner;
use App\Corporate;
use Carbon\Carbon;
use App\WajadOffice;
use Illuminate\Console\Command;
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
        $this->call('migrate:fresh');
        $this->info('App seeds is processing ....');

        $this->call('seed:users');
        $this->call('seed:locations');
        $this->call('seed:pages');
        $this->call('seed:categories');
        $this->call('seed:banners');
        $this->call('seed:colors');
        $this->call('seed:pp');

        factory(User::class, 5)->create();
        factory(WajadOffice::class, 5)->create();
        factory(Item::class, 5)->create();
        factory(Post::class, 5)->create();

        $this->call('seed:posts_images');
        $this->call('seed:post_requests');
        $this->call('seed:questions');
        $this->call('seed:answers');

        $this->info('Database App Seed Successfully');
    }
}
