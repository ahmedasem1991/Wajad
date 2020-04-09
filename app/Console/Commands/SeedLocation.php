<?php

namespace App\Console\Commands;

use App\Settings;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class SeedLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:locations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application locations';

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
        $this->line('|------------------------|');
        $this->line('|---- Seed Countries ----|');
        $this->line('|------------------------|');

        $path = 'app/developer_docs/countries.sql';
        DB::unprepared(file_get_contents($path));

        $this->line('|---------------------------------------|');
        $this->line('|---- Seed Regions and Governorates ----|');
        $this->line('|---------------------------------------|');

        $path = 'app/developer_docs/regions.sql';
        DB::unprepared(file_get_contents($path));
    }
}
