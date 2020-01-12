<?php

namespace App\Console\Commands;

use App\Corporate;
use Illuminate\Console\Command;

class CorporateSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:corporate';

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
        Corporate::create([
            'unique_id' => time() . '-WAJAD-Corporate',
            'name_en' => 'WAJAD Corporate',
            'name_ar' => 'مؤسسة وجد',
            'details_en' => 'WAJAD Corporate For Haj & Omra',
            'details_ar' => 'مؤسسة وجد للحج والعمرة', // User
            'address_en' => 'Jadda - KSA',
            'address_ar' => 'جده - المملكة العربية السعودية',
            'latitude' => '21.4498898',
            'longitude' => '39.4913423',
            'status' => 1,
        ]);
        $this->line('|---------------------------------------------------|');
        $this->line('|---- Nova Corporate Admin Created Successfully ----|');
        $this->line('|---------------------------------------------------|');
    }
}
