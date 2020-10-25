<?php

namespace App\Console\Commands;

use App\Page;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application pages';

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
            DB::table('pages')->delete();
        });
        $pages = [
            [
                'key' => 'about_us',
                'title_en' => 'about_us',
                'title_ar' => 'about_us',
                'body_en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'body_ar' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'key' => 'contact-us',
                'title_en' => 'contact-us',
                'title_ar' => 'contact-us',
                'body_en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'body_ar' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'key' => 'privacy-policy',
                'title_en' => 'privacy-policy',
                'title_ar' => 'privacy-policy',
                'body_en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'body_ar' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'key' => 'terms',
                'title_en' => 'Terms & Conditions',
                'title_ar' => 'الشروط و اﻷحكام',
                'body_en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'body_ar' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],

        ];

        array_map(function ($page) {
            Page::create($page);
        }, $pages);

        $this->line('|-------------------------------------|');
        $this->line('|-- Seeding Pages Done Successfully --|');
        $this->line('|-------------------------------------|');
    }
}
