<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizeMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimizing Media Library';

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
        $models = [
            'Banner',
            'Brand',
            'Category',
            'Corporate',
            'Model',
            'PackageProductMedia',
            'PostReport',
            'Setting',
            'SubCategory',
            'WajadOffice',
        ];

        foreach ($models as $model) {
            $apps = '\\App\\'.$model;

            foreach ($apps::all() as $app) {
                if ((! empty($app->image)) && strpos($app->image, '/') !== 0) {
                    $this->info($app->image);
                    $app->image = '/'.$app->image;
                    $app->save();
                    $this->info($app->image);
                }
            }
        }
    }
}
