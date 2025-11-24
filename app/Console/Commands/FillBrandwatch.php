<?php

namespace App\Console\Commands;

use App\Brand;
use App\Model;
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
        $data = [
            0 => [
                'name_en' => 'Trek',
                'name_ar' => 'Trek',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
                ] ];
      //  $subcategory = SubCategory::find(4);
        //foreach ($category->subcategories as $subcategory){
            
            // $subcategory->brands()->createMany($data);
        //}
        $Brands = Brand::all();
        foreach ($Brands as $Brand){
            
            // $Brand->models()->create([
            //     'name_en' => 'Other',
            //     'name_ar' => 'أخري',
            //     'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            // ]);
        }
        //$subcategory->brands()->createMany($data);
         



        $this->info('|----------------------------------|');
        $this->info('| Seeding Brands Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
