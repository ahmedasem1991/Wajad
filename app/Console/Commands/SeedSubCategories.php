<?php

namespace App\Console\Commands;

use App\Category;
use Illuminate\Console\Command;

class SeedSubCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:subcategories';

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
        $subCategories = [
            [
                'name_en' => 'Blouse',
                'name_ar' => 'بلوزة',
                'icon' => 'images/posts/post7.jpg',
                'category_id' => 1,
                'brands' => [
                    [
                        'name_en' => 'LCWIKIKI',
                        'name_ar' => 'ال سي واى كي كي',
                        'image' => 'images/posts/post7.jpg',

                    ],
                    [
                        'name_en' => 'H&M',
                        'name_ar' => 'اتش اند ام',
                        'image' => 'images/posts/post7.jpg',

                    ],
                    [
                        'name_en' => 'Others',
                        'name_ar' => 'اخرى',
                        'icon' => 'images/posts/post1.jpg',
                    ],
                ],
            ],
            [
                'name_en' => 'shoes',
                'name_ar' => 'حذاء',
                'icon' => 'images/posts/post1.jpg',
                'category_id' => 1,
                'brands' => [
                    [
                        'name_en' => 'lacoste',
                        'name_ar' => 'لاكوست',
                        'image' => 'images/posts/post7.jpg',

                    ],
                    [
                        'name_en' => 'corocs',
                        'name_ar' => 'كروكس',
                        'image' => 'images/posts/post7.jpg',

                    ],
                    [
                        'name_en' => 'Others',
                        'name_ar' => 'اخرى',
                        'icon' => 'images/posts/post1.jpg',

                    ],
                ],
            ],
            [
                'name_en' => 'Others',
                'name_ar' => 'اخرى',
                'icon' => 'images/posts/post1.jpg',
                'category_id' => 1,
            ],
        ];
        $this->info('|------------------------------------------|');
        $this->info('| Seeding Sub Categories Done Successfully |');
        $this->info('|------------------------------------------|');
    }
}
