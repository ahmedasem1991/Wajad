<?php

namespace App\Console\Commands;

use App\Brand;
use App\Model;
use App\Category;
use App\SubCategory;
use Illuminate\Console\Command;

class FillModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:models';

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
       
        $brands = Brand::where('deleted_at',null)->get();
        foreach ($brands as $brand){
            $Model = Model::create([
                'name_en' => 'All Models',
                'name_ar' => 'الجميع',
                'brand_id' => $brand->id
            ]);

            
        }



        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
