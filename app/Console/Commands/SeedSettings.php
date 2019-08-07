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
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.'
            ],
            [
                'key' => 'contact-us',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.'
            ],
            [
                'key' => 'privacy-policy',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.'
            ],
            [
                'key' => 'lorem-ipsum',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.'
            ],
            [
                'key' => 'facebook-link',
                'value' => 'http://www.facebook.com'
            ],
            [
                'key' => 'twitter-link',
                'value' => 'http://www.twitter.com'
            ]
        ];

        foreach ($settings as $setting) {
            Settings::create([
                'key' => $setting['key'],
                'value' => $setting['value']
            ]);
        }

        $this->info('|------------------------------------|');
        $this->info('| Seeding Settings Done Successfully |');
        $this->info('|------------------------------------|');
    }
}
