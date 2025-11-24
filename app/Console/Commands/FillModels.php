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
       
       $data1=[
            0 => ['name_en' => 'American Shorthair', 'name_ar' => 'شورت هير أمريكية', 'brand_id' => '5442'],
            1 => ['name_en' => 'British Shorthair', 'name_ar' => 'شورت هير بريطانية', 'brand_id' => '5442'],
            2 => ['name_en' => 'Exotic Shorthair ', 'name_ar' => 'شورت هير اكزوتيك', 'brand_id' => '5442'],
            3 => ['name_en' => 'Maine Coon', 'name_ar' => 'ماين كون', 'brand_id' => '5442'],
            4 => ['name_en' => 'Persian', 'name_ar' => 'إيرانية', 'brand_id' => '5442'],
            5 => ['name_en' => 'Ragdoll ', 'name_ar' => 'راغدول', 'brand_id' => '5442'],
            6 => ['name_en' => 'Scottish Fold', 'name_ar' => 'سكوتش فولد', 'brand_id' => '5442'],
            7 => ['name_en' => 'Sphynx', 'name_ar' => 'سفنكس', 'brand_id' => '5442'],
            8 => ['name_en' => 'Others', 'name_ar' => 'أخرى', 'brand_id' => '5442']
        ] ;
        
        foreach($data1 as $data)
        {
            Model::create($data); 
        }
        $data2=[
            0 => ['name_en' => 'Bulldog', 'name_ar' => 'بولدوغ', 'brand_id' => '5443'],
            1 => ['name_en' => 'French Bulldog', 'name_ar' => 'بولدوغ الفرنسية', 'brand_id' => '5443'],
            2 => ['name_en' => 'German Shepherd Dog', 'name_ar' => 'جيرمن شيبرد', 'brand_id' => '5443'],
            3 => ['name_en' => 'Golden Retriever', 'name_ar' => 'جولدن ريتريفر', 'brand_id' => '5443'],
            4 => ['name_en' => 'Husky', 'name_ar' => 'هاسكي', 'brand_id' => '5443'],
            5 => ['name_en' => 'Labrador Retriever', 'name_ar' => 'لابرادور ريتريفر', 'brand_id' => '5443'],
            6 => ['name_en' => 'Others', 'name_ar' => 'أخرى', 'brand_id' => '5443'],
        ];

        foreach($data2 as $data)
        {
            Model::create($data); 
        }
       

            
      



        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
