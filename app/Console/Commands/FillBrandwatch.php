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
            0 => array('name_en' => 'Victorinox', 'name_ar' => 'Victorinox', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            1 => array('name_en' => 'American Tourister', 'name_ar' => 'American Tourister', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            2 => array('name_en' => 'Samsonite', 'name_ar' => 'Samsonite', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            3 => array('name_en' => 'Travelpro', 'name_ar' => 'Travelpro', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            4 => array('name_en' => 'Eagle Creek', 'name_ar' => 'Eagle Creek', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            5 => array('name_en' => 'Delsey', 'name_ar' => 'Delsey', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            6 => array('name_en' => 'Briggs & Riley', 'name_ar' => 'Briggs & Riley', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            7 => array('name_en' => 'Victorinox', 'name_ar' => 'Victorinox', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            8 => array('name_en' => 'Tumi', 'name_ar' => 'Tumi', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            9 => array('name_en' => 'Hartmann', 'name_ar' => 'Hartmann', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            10 => array('name_en' => 'Bric’s', 'name_ar' => 'Bric’s', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            11 => array('name_en' => 'Rimowa', 'name_ar' => 'Rimowa', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            12 => array('name_en' => 'Globe-Trotter', 'name_ar' => 'Globe-Trotter', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
            13 => array('name_en' => 'Away', 'name_ar' => 'Away', 'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'),
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
