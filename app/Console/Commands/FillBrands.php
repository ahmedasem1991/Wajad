<?php

namespace App\Console\Commands;

use App\Brand;
use App\Category;
use App\SubCategory;
use Illuminate\Console\Command;

class FillBrands extends Command
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
        $data =array(
            0 => array('name_en' => 'Trek', 'name_ar' => 'تريك'),
            1 => array('name_en' => 'Connondale', 'name_ar' => 'كونونديل'),
            2 => array('name_en' => 'Kona Bikes', 'name_ar' => 'كونا بيكس'),
            3 => array('name_en' => 'Colnago', 'name_ar' => 'كولناغو'),
            4 => array('name_en' => 'Bianchi', 'name_ar' => 'بيانكي'),
            5 => array('name_en' => 'Raleigh', 'name_ar' => 'رالي'),
            6 => array('name_en' => 'Cervelo', 'name_ar' => 'سيرفلو'),
            7 => array('name_en' => 'Orbea', 'name_ar' => 'أوربيا'),
            8 => array('name_en' => 'Others', 'name_ar' => 'أخرى'),
        );
        $subcategory = SubCategory::find(33);
         
        foreach ($data as $item){
            $brand = Brand::create($item);

            
                $subcategory->brands()->attach($brand);
               
         
        }
        



        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
