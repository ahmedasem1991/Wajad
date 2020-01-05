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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class SeedApp extends Command
{
    protected $signature = 'seed:app {fresh?}';

    protected $description = 'Seed Application';

    public function handle()
    {
        // if ($this->argument('fresh')) {
        //     $this->call('migrate:fresh');
        // }

        // $this->call('seed:users');

        // $this->call('seed:corporate');

        // $this->call('seed:locations');

        // $this->call('seed:pages');

        // $this->call('seed:categories');

        // $this->call('seed:banners');

        // $this->call('seed:colors');

        // $this->call('seed:pp');

        $models = [
            'User',
            'WajadOffice'
        ];

        foreach ($models as $model) {
            ${$model . '_count'} = $this->ask("$model Count", 100);

            $modelName = "\\App\\$model";

            factory($modelName::class, 5)->create();

            $this->info('|-------------------------|');
            $this->info("| $model Seeder Completed |");
            $this->info('|-------------------------|');
        }

        $this->info('|Start item factory------------------------------------------|');
        // factory(Item::class, 5)->create();
        $this->info('|Start post factory------------------------------------------|');
        $dispatcher = Post::getEventDispatcher();
        Post::unsetEventDispatcher();
        factory(Post::class, 5)->create();
        Post::setEventDispatcher($dispatcher);


        $this->call('seed:posts_images');
        $this->call('seed:post_requests');
        $this->call('seed:questions');
        // $this->call('seed:answers');

        $this->info('Database App Seed Successfully');

        // Seeed Countries
        $this->info('Seed Roles');
        $path = 'app/developer_docs/roles.sql';
        DB::unprepared(file_get_contents($path));
        $path = 'app/developer_docs/permissions.sql';
        DB::unprepared(file_get_contents($path));
        $path = 'app/developer_docs/role_user.sql';
        DB::unprepared(file_get_contents($path));

        $this->info('Seed Roles and permissions Successfully');
        // Artisan::call('seed:locations');
        Artisan::call('seed:settings');

        // $create_banner_question = $this->ask('Banner Number ?', 5);

        // factory(Banner::class, (int) $create_banner_question)->create();

        // $create_wajad_offices_question = $this->ask('Count Wajad Offices', 5);

        // factory(WajadOffice::class, (int) $create_wajad_offices_question)->create();
    }
}
