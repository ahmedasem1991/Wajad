<?php

namespace App\Console\Commands;

use App\Banner;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedBanners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:banners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application Banners';

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
        DB::transaction(function () {
            DB::table('banners')->delete();
        });

        $banners = [
            [
                "type" => "item",
                "image" => "images/profile/default-profile.png",
                "url" => "https://translate.google.com.eg/",
                "item_id" => "1",
            ],
            [
                "type" => "ads",
                "image" => "images/profile/default-profile.png",
                "url" => "https://translate.google.com.eg/",
                "item_id" => null,
            ],
            [
                "type" => "url",
                "image" => "images/profile/default-profile.png",
                "url" => "https://translate.google.com.eg/",
                "item_id" => null,
            ]
        ];


        foreach ($banners as $banner) {
            Banner::create($banner);
        }


        $this->info('|------------------------------------|');
        $this->info('| Seeding banners Done Successfully |');
        $this->info('|------------------------------------|');
    }
}
