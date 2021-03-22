<?php

namespace App\Console\Commands;

use App\Category;
use App\SubCategory;
use Illuminate\Console\Command;

class FillBrandwatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:brands';

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
        $data = array(
            0 => array('name_en' => 'Victorinox', 'name_ar' => 'Victorinox'),
            1 => array('name_en' => 'American Tourister', 'name_ar' => 'American Tourister'),
            2 => array('name_en' => 'Samsonite', 'name_ar' => 'Samsonite'),
            3 => array('name_en' => 'Travelpro', 'name_ar' => 'Travelpro'),
            4 => array('name_en' => 'Eagle Creek', 'name_ar' => 'Eagle Creek'),
            5 => array('name_en' => 'Delsey', 'name_ar' => 'Delsey'),
            6 => array('name_en' => 'Briggs & Riley', 'name_ar' => 'Briggs & Riley'),
            7 => array('name_en' => 'Victorinox', 'name_ar' => 'Victorinox'),
            8 => array('name_en' => 'Tumi', 'name_ar' => 'Tumi'),
            9 => array('name_en' => 'Hartmann', 'name_ar' => 'Hartmann'),
            10 => array('name_en' => 'Bric’s', 'name_ar' => 'Bric’s'),
            11 => array('name_en' => 'Rimowa', 'name_ar' => 'Rimowa'),
            12 => array('name_en' => 'Globe-Trotter', 'name_ar' => 'Globe-Trotter'),
            13 => array('name_en' => 'Away', 'name_ar' => 'Away'),
        );
      //  $subcategory = SubCategory::find(4);
        //foreach ($category->subcategories as $subcategory){
            
            // $subcategory->brands()->createMany($data);
        //}
        $subcategory = SubCategory::find(5);
        $subcategory->brands()->createMany($data);
        $subcategory = SubCategory::find(8);
        $subcategory->brands()->createMany($data);
        $subcategory = SubCategory::find(9);
        $subcategory->brands()->createMany($data);



        $this->info('|----------------------------------|');
        $this->info('| Seeding Brands Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
