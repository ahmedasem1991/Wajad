<?php

namespace App\Console\Commands;

use App\Color;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedColors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:colors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application Colors';

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
            DB::table('colors')->delete();
        });
        $Colors = [
            [
                'name_en' => 'Red',
                'name_ar' => 'أحمر',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Black',
                'name_ar' => 'أسود',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Blue',
                'name_ar' => 'أزرق',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Brown',
                'name_ar' => 'بني',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Gold',
                'name_ar' => 'ذهبي',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Green',
                'name_ar' => 'أخضر',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Orange',
                'name_ar' => 'برتقالي',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Pink',
                'name_ar' => 'بينك',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Silver',
                'name_ar' => 'فضي',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'White',
                'name_ar' => 'أبيض',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Yellow',
                'name_ar' => 'أصفر',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Crimson',
                'name_ar' => 'قرمزي',
                'icon' => 'images/profile/default-profile.png',

            ],
            [
                'name_en' => 'Others',
                'name_ar' => 'اخرى',
                'icon' => 'images/profile/default-profile.png',
            ],

        ];

        foreach ($Colors as $Color) {
            Color::create($Color);
        }

        $this->info('|------------------------------------|');
        $this->info('|  Seeding Colors Done Successfully  |');
        $this->info('|------------------------------------|');
    }
}
