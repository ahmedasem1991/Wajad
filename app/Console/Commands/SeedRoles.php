<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Roles For Wajad Application';

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
        $this->info('Seed Roles');

        $files = [
            'app/developer_docs/roles.sql',
            'app/developer_docs/role_user.sql',
            'app/developer_docs/permissions.sql',
        ];

        foreach ($files as $file) {
            DB::unprepared(file_get_contents($file));
        }
    }
}
