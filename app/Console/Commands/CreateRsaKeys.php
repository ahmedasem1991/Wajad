<?php

namespace App\Console\Commands;

use phpseclib\Crypt\RSA;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateRsaKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'creatersakeys';

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
        $rsa = new RSA();
        $keys = $rsa->createKey();
        $privateKey = $keys['privatekey'];
        $publicKey = $keys['publickey'];
        Storage::disk('public')->put('keys/publicKey.pem', $publicKey);
        Storage::disk('local')->put('keys/privateKey.pem', $privateKey);
    }
}
