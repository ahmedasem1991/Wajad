<?php

namespace App\Console\Commands;

use App\Item;
use App\Post;
use App\User;
use App\PostType;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedPostTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:post-types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Post Types';

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
            DB::table('post_types')->delete();
            DB::table('posts')->delete();
        });
        $Types = [
            [
                'title' => 'HAG',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'title' => 'OMRA',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'created_at' => null,
                'updated_at' => null
            ],
           
        ];


        foreach ($Types as $Type) {
            PostType::create($Type);
        }

        $users= User::all()->random(3);
        $Posts = [
            [
                'title' => 'I Lost My Device',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'publisher_id' => $users[0]->id,
                'status' => 0,
                'lat' => '21.4070665',
                'lng' => '39.9257528',
                'item_id' => Item::all()->random(1)->first()->id,
                'post_type_id' => PostType::all()->random(1)->first()->id,
                'owner_id' =>$users[0]->id,
                'losted_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'title' => 'I do not find My Device',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'publisher_id' => $users[1]->id,
                'status' => 0,
                'lat' => '21.4579393',
                'lng' => '39.3510704',
                'item_id' => Item::all()->random(1)->first()->id,
                'post_type_id' => PostType::all()->random(1)->first()->id,
                'owner_id' =>$users[1]->id,
                'losted_at'=>Carbon::now()->toDateTimeString()
            ],
            [
                'title' => 'My Device was losted',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio autem ducimus nemo rem. Placeat aliquam delectus itaque illo nobis facere explicabo corporis qui praesentium nemo voluptates quod harum vel, culpa nesciunt sint tempora maxime non. Quidem nihil iure tenetur minus quia sint totam dolores magnam illo! Unde repellendus vitae consequuntur.',
                'publisher_id' => $users[2]->id,
                'status' => 0,
                'lat' => '21.3861314',
                'lng' => '40.5672119',
                'item_id' => Item::all()->random(1)->first()->id,
                'post_type_id' => PostType::all()->random(1)->first()->id,
                'owner_id' =>$users[2]->id,
                'losted_at'=>Carbon::now()->toDateTimeString()
            ],
           
        ];
        foreach ($Posts as $Post) {
            Post::create($Post);
        }

        $this->info('|------------------------------------------------|');
        $this->info('| Seeding Post Types and Posts Done Successfully |');
        $this->info('|------------------------------------------------|');
    }
}
