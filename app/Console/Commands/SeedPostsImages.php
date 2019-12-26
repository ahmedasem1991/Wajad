<?php

namespace App\Console\Commands;

use App\PostImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedPostsImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:posts_images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application Posts Images';

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
            DB::table('post_images')->delete();
        });

        $images = [
            [
                "post_id" => 1,
                "image" => "images/posts/post1.jpg",
            ],
            [
                "post_id" => 1,
                "image" => "images/posts/post2.jpg",
            ],
            [
                "post_id" => 1,
                "image" => "images/posts/post3.jpg",
            ],
            [
                "post_id" => 2,
                "image" => "images/posts/post4.jpg",
            ],
            [
                "post_id" => 2,
                "image" => "images/posts/post5.jpg",
            ],
            [
                "post_id" => 2,
                "image" => "images/posts/post6.jpg",
            ],
            [
                "post_id" => 3,
                "image" => "images/posts/post7.jpg",
            ],
            [
                "post_id" => 3,
                "image" => "images/posts/post1.jpg",
            ],
            [
                "post_id" => 3,
                "image" => "images/posts/post2.jpg",
            ],
            [
                "post_id" => 4,
                "image" => "images/posts/post1.jpg",
            ],
            [
                "post_id" => 4,
                "image" => "images/posts/post2.jpg",
            ],
            [
                "post_id" => 5,
                "image" => "images/posts/post3.jpg",
            ],
            [
                "post_id" => 5,
                "image" => "images/posts/post4.jpg",
            ],
            [
                "post_id" => 5,
                "image" => "images/posts/post5.jpg",
            ],
            [
                "post_id" => 6,
                "image" => "images/posts/post1.jpg",
            ],
            [
                "post_id" => 7,
                "image" => "images/posts/post2.jpg",
            ],
            [
                "post_id" => 8,
                "image" => "images/posts/post3.jpg",
            ],
            [
                "post_id" => 9,
                "image" => "images/posts/post4.jpg",
            ],
            [
                "post_id" => 10,
                "image" => "images/posts/post6.jpg",
            ],
            [
                "post_id" => 11,
                "image" => "images/posts/post7.jpg",
            ],
            [
                "post_id" => 12,
                "image" => "images/posts/post1.jpg",
            ],
            [
                "post_id" => 13,
                "image" => "images/posts/post2.jpg",
            ],
            [
                "post_id" => 14,
                "image" => "images/posts/post3.jpg",
            ],
            [
                "post_id" => 15,
                "image" => "images/posts/post4.jpg",
            ],
            [
                "post_id" => 16,
                "image" => "images/posts/post5.jpg",
            ],
            [
                "post_id" => 17,
                "image" => "images/posts/post5.jpg",
            ],
            [
                "post_id" => 18,
                "image" => "images/posts/post1.jpg",
            ],
            [
                "post_id" => 19,
                "image" => "images/posts/post2.jpg",
            ],
            [
                "post_id" => 20,
                "image" => "images/posts/post3.jpg",
            ],
            [
                "post_id" => 21,
                "image" => "images/posts/post4.jpg",
            ],
            [
                "post_id" => 5,
                "image" => "images/posts/post6.jpg",
            ],
            [
                "post_id" => 5,
                "image" => "images/posts/post5.jpg",
            ],

        ];


        foreach ($images as $image) {
            PostImage::create($image);
        }


        $this->info('|------------------------------------|');
        $this->info('|  Seeding Posts Images Done Successfully |');
        $this->info('|------------------------------------|');
    }
}
