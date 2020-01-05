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
        if ($this->argument('fresh')) {
            $this->call('migrate:fresh');
        }

        $this->call('seed:locations');

        $this->call('seed:pages');

        $this->call('seed:categories');

        $this->call('seed:colors');

        $this->call('seed:pp');

        $this->call('seed:users');

        $usersNumber = $this->ask('Users Count', 100);

        factory(User::class, (int) $usersNumber)->create();

        $this->info('|------------------------|');
        $this->info('| Users Seeder Completed |');
        $this->info('|------------------------|');

        $corporateCount = $this->ask('Corporates Count', 100);

        factory(Corporate::class, (int) $corporateCount)->create();

        $this->info('|----------------------------|');
        $this->info('| Corporate Seeder Completed |');
        $this->info('|----------------------------|');

        $this->call('seed:items');

        $this->call('seed:banners');

        $this->call('seed:posts');

        // $this->info('Database App Seed Successfully');

        // // Seeed Countries
        // $this->info('Seed Roles');
        // $path = 'app/developer_docs/roles.sql';
        // DB::unprepared(file_get_contents($path));
        // $path = 'app/developer_docs/permissions.sql';
        // DB::unprepared(file_get_contents($path));
        // $path = 'app/developer_docs/role_user.sql';
        // DB::unprepared(file_get_contents($path));

        // $this->info('Seed Roles and permissions Successfully');
        // // Artisan::call('seed:locations');
        // Artisan::call('seed:settings');

        // $create_banner_question = $this->ask('Banner Number ?', 5);

        // factory(Banner::class, (int) $create_banner_question)->create();

        // $create_wajad_offices_question = $this->ask('Count Wajad Offices', 5);

        // factory(WajadOffice::class, (int) $create_wajad_offices_question)->create();
    }
}
