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
            0 => array(
                'name_en' => 'Trek',
                'name_ar' => 'Trek',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            1 => array(
                'name_en' => 'Connondale',
                'name_ar' => 'Connondale',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            2 => array(
                'name_en' => 'Kona Bikes',
                'name_ar' => 'Kona Bikes',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            3 => array(
                'name_en' => 'Colnago',
                'name_ar' => 'Colnago',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            4 => array(
                'name_en' => 'Bianchi',
                'name_ar' => 'Bianchi',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            5 => array(
                'name_en' => 'Raleigh',
                'name_ar' => 'Raleigh',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            6 => array(
                'name_en' => 'Cervelo',
                'name_ar' => 'Cervelo',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            7 => array(
                'name_en' => 'Orbea',
                'name_ar' => 'Orbea',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
        );
      //  $subcategory = SubCategory::find(4);
        //foreach ($category->subcategories as $subcategory){
            
            // $subcategory->brands()->createMany($data);
        //}
        $subcategory = SubCategory::find(31);
        //$subcategory->brands()->createMany($data);
         



        $this->info('|----------------------------------|');
        $this->info('| Seeding Brands Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
