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
            0 => array('name_en' => 'Victorinox', 'name_ar' => 'فسكتورنوكس'),
            1 => array('name_en' => 'American Tourister', 'name_ar' => 'أمريكان توريستر'),
            2 => array('name_en' => 'Samsonite', 'name_ar' => 'سامسونايت'),
            3 => array('name_en' => 'Travelpro', 'name_ar' => 'ترافلبرو'),
            4 => array('name_en' => 'Eagle Creek', 'name_ar' => 'إيجل كريك'),
            5 => array('name_en' => 'Delsey', 'name_ar' => 'ديلسي'),
            6 => array('name_en' => 'Briggs & Riley', 'name_ar' => 'بريجز اند رايلي'),
            7 => array('name_en' => 'Victorinox', 'name_ar' => 'فسكتورنوكس'),
            8 => array('name_en' => 'Tumi', 'name_ar' => 'تومي'),
            9 => array('name_en' => 'Hartmann', 'name_ar' => 'هارتمان'),
            10 => array('name_en' => 'Bric’s', 'name_ar' => 'بريتش'),
            11 => array('name_en' => 'Rimowa', 'name_ar' => 'ريموا'),
            12 => array('name_en' => 'Globe-Trotter', 'name_ar' => 'غلوب تروتر'),
            13 => array('name_en' => 'Away', 'name_ar' => 'أواي'),
            14 => array('name_en' => 'Others', 'name_ar' => 'أخرى'),
        );
        $subcategory = SubCategory::find(9);
         
        foreach ($data as $item){
            $brand = Brand::create($item);

            
                $subcategory->brands()->attach($brand);
               
         
        }
        



        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
