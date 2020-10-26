<?php

namespace App\Console\Commands;

use App\People;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedPeople extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:people';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application People';

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
            DB::table('people')->delete();
        });
        $People = [
            [
                'id' => 0,
                'name' => 'Add New Person',
                'email' => 'new@person.com',
                'created_at' => '2010-10-25 16:42:05',
                'updated_at' => '2010-10-25 16:42:05',
                'deleted_at' => '2010-10-25 16:42:05',
            ],
           
        ];

        foreach ($People as $p) {
            $person= new People;
            $person->id=$p['id'];
            $person->name=$p['name'];
            $person->email=$p['email'];
            $person->created_at=$p['created_at'];
            $person->updated_at=$p['updated_at'];
            $person->deleted_at=$p['deleted_at'];
            $person->save();
            $person->id=0;
            $person->save();
        }

        $this->line('|------------------------------------|');
        $this->line('|  Seeding People Done Successfully  |');
        $this->line('|------------------------------------|');
    }
}
