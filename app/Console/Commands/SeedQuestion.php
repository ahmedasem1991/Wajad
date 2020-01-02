<?php

namespace App\Console\Commands;

use App\Question;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedQuestion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:questions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application Questions';

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
            DB::table('questions')->delete();
        });
        $questions = [
            [
                'question' => "question1?",
                'post_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'question' => "question2?",
                'post_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'question' => "question3?",
                'post_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'question' => "question1?",
                'post_id' => 2,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'question' => "question1?",
                'post_id' => 3,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'question' => "question1?",
                'post_id' => 4,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'question' => "question1?",
                'post_id' => 5,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],

        ];

        foreach ($questions as $question) {
            Question::create($question);
        }

        $this->info('|---------------------------------------|');
        $this->info('|  Seeding Questions Done Successfully  |');
        $this->info('|---------------------------------------|');
    }
}
