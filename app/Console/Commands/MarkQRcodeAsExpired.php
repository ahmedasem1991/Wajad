<?php

namespace App\Console\Commands;

use App\Qrcode;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MarkQRcodeAsExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qrcode:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check on the qrcode end date if it is smaller than today mark it as expired ';

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
        $qrcodes = Qrcode::Where('end_at', '<', Carbon::today())->get();
        foreach ($qrcodes as $qrcode) {
            $qrcode->update(['status' => 6]);
        }
    }
}
