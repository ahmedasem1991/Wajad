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
                'Trek' => 'Connondale',
                '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            1 => array(
                'Trek' => 'Kona Bikes',
                '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            2 => array(
                'Trek' => 'Colnago',
                '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            3 => array(
                'Trek' => 'Bianchi',
                '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            4 => array(
                'Trek' => 'Raleigh',
                '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            5 => array(
                'Trek' => 'Cervelo',
                '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            6 => array(
                'Trek' => 'Orbea',
                '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
        );
      //  $subcategory = SubCategory::find(4);
        //foreach ($category->subcategories as $subcategory){
            
            // $subcategory->brands()->createMany($data);
        //}
        $subcategory = SubCategory::find(31);
        $subcategory->brands()->createMany($data);
         



        $this->info('|----------------------------------|');
        $this->info('| Seeding Brands Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
