<?php

namespace App\Console\Commands;

use App\Answer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedAnswers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:answers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application Answers';

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
            DB::table('answers')->delete();
        });
        $answers = [
            [
                'user_id' => 1,
                'answers' => "answer1",
                'question_id' => 8,
                'post_request_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'user_id' => 2,
                'answers' => "answer1",
                'question_id' => 9,
                'post_request_id' => 2,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'user_id' => 3,
                'answers' => "answer1",
                'question_id' => 10,
                'post_request_id' => 3,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'user_id' => 4,
                'answers' => "answer1",
                'question_id' => 11,
                'post_request_id' => 4,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'user_id' => 5,
                'answers' => "answer1",
                'question_id' => 12,
                'post_request_id' => 5,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'user_id' => 6,
                'answers' => "answer1",
                'question_id' => 13,
                'post_request_id' => 6,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'user_id' => 7,
                'answers' => "answer1",
                'question_id' => 14,
                'post_request_id' => 7,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        foreach ($answers as $answer) {
            Answer::create($answer);
        }

        $this->info('|-------------------------------------|');
        $this->info('|  Seeding Answers Done Successfully  |');
        $this->info('|-------------------------------------|');
    }
}
