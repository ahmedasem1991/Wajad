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
                'name_en' => 'Bertram',
                'name_ar' => 'Bertram',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            1 => array(
                'name_en' => 'Boston Whaler',
                'name_ar' => 'Boston Whaler',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            2 => array(
                'name_en' => 'Chaparral',
                'name_ar' => 'Chaparral',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            3 => array(
                'name_en' => 'Grady-White',
                'name_ar' => 'Grady-White',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            4 => array(
                'name_en' => 'Lund',
                'name_ar' => 'Lund',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            5 => array(
                'name_en' => 'Mastercraft',
                'name_ar' => 'Mastercraft',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            6 => array(
                'name_en' => 'Sea Ray',
                'name_ar' => 'Sea Ray',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            7 => array(
                'name_en' => 'Tracker',
                'name_ar' => 'Tracker',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            8 => array(
                'name_en' => 'Yamaha',
                'name_ar' => 'Yamaha',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            9 => array(
                'name_en' => 'Viking Yachts',
                'name_ar' => 'Viking Yachts',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
        );
      //  $subcategory = SubCategory::find(4);
        //foreach ($category->subcategories as $subcategory){
            
            // $subcategory->brands()->createMany($data);
        //}
        $subcategory = SubCategory::find(34);
        $subcategory->brands()->createMany($data);
         



        $this->info('|----------------------------------|');
        $this->info('| Seeding Brands Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
