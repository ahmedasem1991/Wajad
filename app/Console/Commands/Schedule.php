<?php

namespace App\Console\Commands;

use App\Corporate;
use Illuminate\Console\Command;

class Schedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily schedule';

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
        $Corporates = Corporate::all();

        foreach ($Corporates as $corporate) {
            if ($corporate->ended())
                $corporate->status = 0;
            $corporate->save();
        }

        $this->info('|----------------------------------|');
        $this->info('| Daily Schedule Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
