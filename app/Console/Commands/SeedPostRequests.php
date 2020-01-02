<?php

namespace App\Console\Commands;

use App\PostRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedPostRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:post_requests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application Posts Requests';

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
        DB::transaction(function () {
            DB::table('post_requests')->delete();
        });
        $post_requests = [
            [
                'user_id' => 4,
                'post_id' => 1,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 5,
                'post_id' => 1,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 6,
                'post_id' => 1,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 7,
                'post_id' => 2,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 8,
                'post_id' => 2,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 9,
                'post_id' => 2,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 4,
                'post_id' => 3,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 5,
                'post_id' => 3,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 6,
                'post_id' => 4,
                'is_request_valid' => 0,
            ],
            [
                'user_id' => 4,
                'post_id' => 5,
                'is_request_valid' => 0,
            ],

        ];

        foreach ($post_requests as $post_request) {
            PostRequest::create($post_request);
        }

        $this->info('|--------------------------------------------|');
        $this->info('|  Seeding Posts Requests Done Successfully  |');
        $this->info('|--------------------------------------------|');
    }
}
