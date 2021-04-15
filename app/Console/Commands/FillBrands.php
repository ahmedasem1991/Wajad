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
            0 => array('name_en' => 'Brighton', 'name_ar' => 'برايتون'),
            1 => array('name_en' => 'Burberry', 'name_ar' => 'بربري'),
            2 => array('name_en' => 'Calvin Klein', 'name_ar' => 'كالفن كلاين'),
            3 => array('name_en' => 'Chanel', 'name_ar' => 'شانيل'),
            4 => array('name_en' => 'Chloé', 'name_ar' => 'كلوي'),
            5 => array('name_en' => 'Coach', 'name_ar' => 'كوتش'),
            6 => array('name_en' => 'Coach Factory', 'name_ar' => 'كوتش فاكتوري'),
            7 => array('name_en' => 'Cole Haan', 'name_ar' => 'كول هان'),
            8 => array('name_en' => 'Dooney & Bourke', 'name_ar' => 'دوني اند بورك'),
            9 => array('name_en' => 'Fendi', 'name_ar' => 'فيندي'),
            10 => array('name_en' => 'Fossil', 'name_ar' => 'فوسيل'),
            11 => array('name_en' => 'Furla', 'name_ar' => 'فورلا'),
            12 => array('name_en' => 'Gucci', 'name_ar' => 'غوتشي'),
            13 => array('name_en' => 'Kate Spade New York', 'name_ar' => 'كيت سبيد نيويورك'),
            14 => array('name_en' => 'Longchamp', 'name_ar' => 'لونج شامب'),
            15 => array('name_en' => 'Louis Vuitton', 'name_ar' => 'لويس فويتون'),
            16 => array('name_en' => 'Marc by Marc Jacobs', 'name_ar' => 'مارك باي مارك جاكوبس'),
            17 => array('name_en' => 'Michael Kors', 'name_ar' => 'مايكل كورس'),
            18 => array('name_en' => 'Nine West', 'name_ar' => 'ناين وست'),
            19 => array('name_en' => 'Prada', 'name_ar' => 'برادا'),
            20 => array('name_en' => 'Rebecca Minkoff', 'name_ar' => 'ريبيكا مينكوف'),
            21 => array('name_en' => 'Salvatore Ferragamo', 'name_ar' => 'سلفاتوري فيراغامو'),
            22 => array('name_en' => 'Ted Baker', 'name_ar' => 'تيد بيكر'),
            23 => array('name_en' => 'Tory Burch', 'name_ar' => 'توري بورش'),
            24 => array('name_en' => 'Other', 'name_ar' => 'أخرى'),
        );
        $subcategory = SubCategory::find(8);
         
        foreach ($data as $item){
            $brand = Brand::create($item);

            
                $subcategory->brands()->attach($brand);
               
         
        }
        



        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
