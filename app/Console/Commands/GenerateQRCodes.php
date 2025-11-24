<?php

namespace App\Console\Commands;

use App\GenerateQrcode;
use App\Qrcode;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateQRCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qrcode:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate QRCodes automatically.';

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
        $Single_count = Qrcode::whereNull('assign_reference_number')->where('type', 1)->count();
        $this->info('|-------------------------------------|');
        $this->info($Single_count);
        if ($Single_count < MinQRCodesNumber()) {
            $now = Carbon::now();

            $middle = $now->year.$now->month.$now->day.'-'.$now->hour.$now->minute;

            $generate_reference_number = 'N-'.$middle.$now->second;
            GenerateQrcode::create([
                'generate_reference_number' => $generate_reference_number,
                'type' => 1,
                'quantity' => 10000,
                'created_by' => null,
                'created_from' => 'system',
            ]);

        }

        $Multi_count = Qrcode::whereNull('assign_reference_number')->where('type', 2)->count();
        $this->info('|-------------------------------------|');
        $this->info($Multi_count);
        if ($Multi_count < MinQRCodesNumber()) {
            $now = Carbon::now();

            $middle = $now->year.$now->month.$now->day.'-'.$now->hour.$now->minute;

            $generate_reference_number = 'N-'.$middle.$now->second;
            GenerateQrcode::create([
                'generate_reference_number' => $generate_reference_number,
                'type' => 2,
                'quantity' => 10000,
                'created_by' => null,
                'created_from' => 'system',
            ]);

        }

    }
}
