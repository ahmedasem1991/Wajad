<?php

namespace App\Console\Commands;

use App\Banner;
use Carbon\Carbon;
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
                "image" => "images/banners/banner1.jpg",
                "url" => "https://translate.google.com.eg/",
                "item_id" => "1",
                "clicks" => 0,
                "start_date" => Carbon::now()->toDateTimeString(),
                "end_date" => Carbon::now()->toDateTimeString(),
            ],
            [
                "type" => "ads",
                "image" => "images/banners/banner2.jpg",
                "url" => "https://translate.google.com.eg/",
                "item_id" => null,
                "clicks" => 0,
                "start_date" => Carbon::now()->toDateTimeString(),
                "end_date" => Carbon::now()->toDateTimeString(),
            ],
            [
                "type" => "url",
                "image" => "images/banners/banner3.jpg",
                "url" => "https://translate.google.com.eg/",
                "item_id" => null,
                "clicks" => 0,
                "start_date" => Carbon::now()->toDateTimeString(),
                "end_date" => Carbon::now()->toDateTimeString(),
            ]
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }

        $this->line('|------------------------------------|');
        $this->line('|  Seeding banners Done Successfully |');
        $this->line('|------------------------------------|');
    }
}
