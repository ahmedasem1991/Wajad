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
                'name_en' => 'Aprilia',
                'name_ar' => 'Aprilia',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            1 => array(
                'name_en' => 'Beta',
                'name_ar' => 'Beta',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            2 => array(
                'name_en' => 'BMW',
                'name_ar' => 'BMW',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            3 => array(
                'name_en' => 'Ducati',
                'name_ar' => 'Ducati',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            4 => array(
                'name_en' => 'Gas Gas',
                'name_ar' => 'Gas Gas',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            5 => array(
                'name_en' => 'Harley Davidson ',
                'name_ar' => 'Harley Davidson ',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            6 => array(
                'name_en' => 'Honda  ',
                'name_ar' => 'Honda  ',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            7 => array(
                'name_en' => 'Husqvarna',
                'name_ar' => 'Husqvarna',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            8 => array(
                'name_en' => 'Kawasaki',
                'name_ar' => 'Kawasaki',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            9 => array(
                'name_en' => 'Royal Enfield',
                'name_ar' => 'Royal Enfield',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            10 => array(
                'name_en' => 'Suzuki ',
                'name_ar' => 'Suzuki ',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            11 => array(
                'name_en' => 'SYM Motors',
                'name_ar' => 'SYM Motors',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            12 => array(
                'name_en' => 'Triumph',
                'name_ar' => 'Triumph',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            13 => array(
                'name_en' => 'Vespa',
                'name_ar' => 'Vespa',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            14 => array(
                'name_en' => 'Yamaha',
                'name_ar' => 'Yamaha',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
        );
      //  $subcategory = SubCategory::find(4);
        //foreach ($category->subcategories as $subcategory){
            
            // $subcategory->brands()->createMany($data);
        //}
        $subcategory = SubCategory::find(33);
        $subcategory->brands()->createMany($data);
         



        $this->info('|----------------------------------|');
        $this->info('| Seeding Brands Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
