<?php

namespace App\Console\Commands;

use App\Post;
use App\Question;
use App\User;
use Illuminate\Console\Command;

class SeedPostQuestionsAndAnswears extends Command
{
    protected $signature = 'seed:post-questions-and-answears';

    protected $description = 'Command description';

    public function handle()
    {
        $posts = Post::get();
        $userIds = User::get()->pluck('id');

        $each_question_for_each_post = $this->ask('Each Question For Each Post', 3);

        $faker = \Faker\Factory::create();

        foreach ($posts as $post) {
            for ($i = 0; $i < $each_question_for_each_post; $i++) {
                $post->questions()->create([
                    'question' => $faker->text().' ?',
                ]);
            }
        }

        $this->line('|--------------------------|');
        $this->line('|-- Posts Questions Done --|');
        $this->line('|--------------------------|');

        if ($this->confirm('Seed Answears ? ', true)) {
            Question::get()->each(function ($question) use ($faker, $userIds) {
                $question->answers()->create([
                    'answers' => $faker->paragraph(),
                    'user_id' => $userIds->random(),
                ]);
            });

            $this->line('|-------------------------|');
            $this->line('|-- Posts Answears Done --|');
            $this->line('|-------------------------|');
        }
    }
}
