<?php

namespace App\Console\Commands;

use App\Settings;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application Settings';

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
            DB::table('settings')->delete();
        });
        $settings = [
            [
                'key' => 'about-us',
                //'title' => 'About us',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'key' => 'contact-us',
                //'title' => 'Contact us',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'key' => 'privacy-policy',
                //'title' => 'Privacy And Policy',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'key' => 'lorem-ipsum',
                // 'title' => 'Privacy And Policy',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'key' => 'facebook-link',
                //'title' => 'Facebook Link',
                'value' => 'http://www.facebook.com',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'key' => 'twitter-link',
                //'title' => 'Twitter Link',
                'value' => 'http://www.twitter.com',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'key' => 'limited-posts',
                //'title' => 'Limited Posts',
                'value' => 50,
                'created_at' => null,
                'updated_at' => null
            ]
        ];

        foreach ($settings as $setting) {
            Settings::create($setting);
        }

        $this->info('|------------------------------------|');
        $this->info('| Seeding Settings Done Successfully |');
        $this->info('|------------------------------------|');
    }
}
