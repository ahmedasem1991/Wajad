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
            ['name_ar'=>'TV','name_en'=>'TV',],
            ['name_ar'=>'Tablets','name_en'=>'Tablets',],
            ['name_ar'=>'Camera','name_en'=>'Camera',],
            ['name_ar'=>'PC','name_en'=>'PC',],
            ['name_ar'=>'Printer','name_en'=>'Printer',],
            ['name_ar'=>'Laptops','name_en'=>'Laptops',],
            ['name_ar'=>'Monitor','name_en'=>'Monitor',],
            ['name_ar'=>'Cell Phone','name_en'=>'Cell Phone',],
            ['name_ar'=>'Scanner','name_en'=>'Scanner',],
            ['name_ar'=>'GPS','name_en'=>'GPS',],
            ['name_ar'=>'Headphones','name_en'=>'Headphones',],
            ['name_ar'=>'PlayStation','name_en'=>'PlayStation',],
            ['name_ar'=>'Guitars','name_en'=>'Guitars',],
            ['name_ar'=>'Office Supplies ','name_en'=>'Office Supplies ',],
            ['name_ar'=>'Other Electronic','name_en'=>'Other Electronic',],
        ];
        $category = Category::find(1);
        $category->subcategories()->createMany($data);


        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
