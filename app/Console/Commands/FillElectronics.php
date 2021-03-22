<?php

namespace App\Console\Commands;

use App\Category;
use App\SubCategory;
use Illuminate\Console\Command;

class FillElectronics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:electronics';

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
        $data = [
            ['name_en'=>'TV',],
            ['name_en'=>'Tablets',],
            ['name_en'=>'Camera',],
            ['name_en'=>'PC',],
            ['name_en'=>'Printer',],
            ['name_en'=>'Laptops',],
            ['name_en'=>'Monitor',],
            ['name_en'=>'Cell Phone',],
            ['name_en'=>'Scanner',],
            ['name_en'=>'GPS',],
            ['name_en'=>'Headphones',],
            ['name_en'=>'PlayStation',],
            ['name_en'=>'Guitars',],
            ['name_en'=>'Office Supplies ',],
            ['name_en'=>'Other Electronic',],
        ];
        $category = Category::find(1);
        $category->subcategories()->create($data);


        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
