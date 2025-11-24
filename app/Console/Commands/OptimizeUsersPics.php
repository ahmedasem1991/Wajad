<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class OptimizeUsersPics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:optimizeUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimizing Users Media';

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
     * @return int
     */
    public function handle()
    {
        $admins = User::where('type', User::Types['admin'])->get();
        $corporates = User::where('type', User::Types['corporate'])->get();

        foreach ($admins as $app) {
            if ((! empty($app->image)) && strpos($app->image, '/') !== 0) {
                $this->info($app->image);
                $app->image = '/'.$app->image;
                $app->save();
                $this->info($app->image);
            }
        }

        foreach ($corporates as $app) {
            if ((! empty($app->image)) && strpos($app->image, '/') !== 0) {
                $this->info($app->image);
                $app->image = '/'.$app->image;
                $app->save();
                $this->info($app->image);
            }
        }

    }
}
