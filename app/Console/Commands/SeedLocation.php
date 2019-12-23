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



        /**---------------------------------------------*\
        |                 Seed Countries                 |
        \-----------------------------------------------*/
        // Seeed Countries
        $this->info('|------------------------------------|');
        $this->info('| Seed Countries |');
        $this->info('|------------------------------------|');

        $path = 'app/developer_docs/countries.sql';
        DB::unprepared(file_get_contents($path));

        $this->countries = \App\Country::all();

        /**---------------------------------------------*\
        |          Seed Regions, Cities                  |
        \-----------------------------------------------*/

        // Seeed Regions
        $this->info('|------------------------------------|');
        $this->info('|   Seed Regions and Governorates    |');
        $this->info('|------------------------------------|');

        $path = 'app/developer_docs/regions.sql';
        DB::unprepared(file_get_contents($path));

        $cities_ids = \App\City::pluck('id')->values()->toArray();
        $countries_ids = \App\Country::pluck('id')->values()->toArray();
    }
}
