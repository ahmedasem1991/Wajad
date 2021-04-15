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
            0 => array('name_en' => 'Adly', 'name_ar' => 'أدلي'),
            1 => array('name_en' => 'Aeon', 'name_ar' => 'ايون'),
            2 => array('name_en' => 'AJS', 'name_ar' => 'اي جي اس'),
            3 => array('name_en' => 'Aprilia', 'name_ar' => 'ابريليا'),
            4 => array('name_en' => 'Askoll', 'name_ar' => 'أسكول'),
            5 => array('name_en' => 'Avangan', 'name_ar' => 'أفانغان'),
            6 => array('name_en' => 'Bajaj', 'name_ar' => 'باجاج'),
            7 => array('name_en' => 'Baotian', 'name_ar' => 'باوتيان'),
            8 => array('name_en' => 'Bashan', 'name_ar' => 'باشان'),
            9 => array('name_en' => 'Beeline', 'name_ar' => 'بيلاين'),
            10 => array('name_en' => 'Benelli', 'name_ar' => 'بينيلي'),
            11 => array('name_en' => 'Benzhou', 'name_ar' => 'بنتشو'),
            12 => array('name_en' => 'Beta', 'name_ar' => 'بيتا'),
            13 => array('name_en' => 'BMW', 'name_ar' => 'بي ام دبليو'),
            14 => array('name_en' => 'Boom', 'name_ar' => 'بوم'),
            15 => array('name_en' => 'Čezeta', 'name_ar' => 'تشيزيتا'),
            16 => array('name_en' => 'CFMOTO', 'name_ar' => 'كفموتو'),
            17 => array('name_en' => 'Chicago Scooter', 'name_ar' => 'شيكاغو سكوتر'),
            18 => array('name_en' => 'CPI', 'name_ar' => 'سي بي اي'),
            19 => array('name_en' => 'Daelim', 'name_ar' => 'دايليم'),
            20 => array('name_en' => 'Dafra', 'name_ar' => 'دفرا'),
            21 => array('name_en' => 'Derbi', 'name_ar' => 'ديربي'),
            22 => array('name_en' => 'Doohan', 'name_ar' => 'دوهان'),
            23 => array('name_en' => 'Explorer', 'name_ar' => 'اكسبلورر'),
            24 => array('name_en' => 'Forza', 'name_ar' => 'فورزا'),
            25 => array('name_en' => 'Garelli', 'name_ar' => 'غاريللي'),
            26 => array('name_en' => 'Genuine', 'name_ar' => 'غينين'),
            27 => array('name_en' => 'Gilera', 'name_ar' => 'جيليرا'),
            28 => array('name_en' => 'Gogoro', 'name_ar' => 'غوغورو'),
            29 => array('name_en' => 'GOVECS', 'name_ar' => 'جوفيكس'),
            30 => array('name_en' => 'Haojin', 'name_ar' => 'هاوجين'),
            31 => array('name_en' => 'Hartford', 'name_ar' => 'هارتفورد'),
            32 => array('name_en' => 'Hero', 'name_ar' => 'هيرو'),
            33 => array('name_en' => 'Honda', 'name_ar' => 'هوندا'),
            34 => array('name_en' => 'Hunted Scooters', 'name_ar' => 'هونتد سكوتيرز'),
            35 => array('name_en' => 'Hyosung', 'name_ar' => 'هيوسونغ'),
            36 => array('name_en' => 'Jialing', 'name_ar' => '"جيالينغ'),
            38 => array('name_en' => 'Jianshe', 'name_ar' => 'جيانشي'),
            39 => array('name_en' => 'JMI', 'name_ar' => 'جيمي'),
            40 => array('name_en' => 'Jonway', 'name_ar' => 'جونواي'),
            41 => array('name_en' => 'Junak', 'name_ar' => 'جوناك'),
            42 => array('name_en' => 'Kawasaki', 'name_ar' => 'كاواساكي'),
            43 => array('name_en' => 'Keeway', 'name_ar' => 'كيواي'),
            44 => array('name_en' => 'Kymco', 'name_ar' => 'كيمكو'),
            45 => array('name_en' => 'Lambretta', 'name_ar' => 'لامبريتا'),
            46 => array('name_en' => 'Lance', 'name_ar' => 'لانس'),
            47 => array('name_en' => 'Lifan', 'name_ar' => 'ليفان'),
            48 => array('name_en' => 'Linlong', 'name_ar' => 'لينلونغ'),
            49 => array('name_en' => 'Lohia Machinery Limited', 'name_ar' => 'لوهيا ماشينيري ليمتيد'),
            50 => array('name_en' => 'Loncin', 'name_ar' => 'لونسين'),
            51 => array('name_en' => 'Longjia', 'name_ar' => 'لونغجيا'),
            52 => array('name_en' => 'Mahindra', 'name_ar' => 'ماهيندرا'),
            53 => array('name_en' => 'Malaguti', 'name_ar' => 'مالاجوتي'),
            54 => array('name_en' => 'MBK', 'name_ar' => 'ام بي كي'),
            55 => array('name_en' => 'Modenas', 'name_ar' => 'موديناس'),
            56 => array('name_en' => 'Moto', 'name_ar' => 'موتو'),
            57 => array('name_en' => 'Motorini', 'name_ar' => 'موتوريني'),
            58 => array('name_en' => 'MZ', 'name_ar' => 'ام از'),
            59 => array('name_en' => 'NIU', 'name_ar' => 'نيو'),
            60 => array('name_en' => 'Peugeot', 'name_ar' => 'بيجو'),
            61 => array('name_en' => 'PGO Scooters', 'name_ar' => 'بي جي او سكوترز'),
            62 => array('name_en' => 'Piaggio', 'name_ar' => 'بياجيو'),
            63 => array('name_en' => 'Raine Scooters', 'name_ar' => 'ريني سكوترز'),
            64 => array('name_en' => 'Rex', 'name_ar' => 'ريكس'),
            65 => array('name_en' => 'Rieju', 'name_ar' => 'ريجو'),
            66 => array('name_en' => 'Rivero', 'name_ar' => 'ريفيرو'),
            67 => array('name_en' => 'Royal Alloy', 'name_ar' => 'رويال الوي'),
            68 => array('name_en' => 'RUSI', 'name_ar' => 'روسي'),
            69 => array('name_en' => 'Scomadi', 'name_ar' => 'سكومادي'),
            70 => array('name_en' => 'Shineray', 'name_ar' => 'شاينراي'),
            71 => array('name_en' => 'Sinnis', 'name_ar' => 'سينيس'),
            72 => array('name_en' => 'Solifer', 'name_ar' => 'سوليفر'),
            73 => array('name_en' => 'Suzuki', 'name_ar' => 'سوزوكي'),
            74 => array('name_en' => 'SYM', 'name_ar' => 'اس واي ام'),
            75 => array('name_en' => 'Taiwan Golden Bee ', 'name_ar' => 'تايوان جولدن بي'),
            76 => array('name_en' => 'Tao Motors', 'name_ar' => 'تاو موتورز'),
            77 => array('name_en' => 'Tell', 'name_ar' => 'تيل'),
            78 => array('name_en' => 'TNT', 'name_ar' => 'تي ان تي'),
            79 => array('name_en' => 'TVS', 'name_ar' => 'تي في اس'),
            80 => array('name_en' => 'Ujet', 'name_ar' => 'يوجت'),
            81 => array('name_en' => 'Unu', 'name_ar' => 'أونو'),
            82 => array('name_en' => 'Veleco', 'name_ar' => 'فيليكو'),
            83 => array('name_en' => 'Vespa', 'name_ar' => 'فيسبا'),
            84 => array('name_en' => 'Vitacci', 'name_ar' => 'فيتاتشي'),
            85 => array('name_en' => 'Vostok', 'name_ar' => 'فوستوك'),
            86 => array('name_en' => 'Wasp Scooters', 'name_ar' => 'واسب سكوترز'),
            87 => array('name_en' => 'Wolf Brand Scooters', 'name_ar' => 'وولف براند سكوترز'),
            88 => array('name_en' => 'Xingyue', 'name_ar' => 'اكسينغيو'),
            89 => array('name_en' => 'Yamaha', 'name_ar' => 'ياماها'),
            90 => array('name_en' => 'Yiying', 'name_ar' => 'يينغ'),
            91 => array('name_en' => 'Z Electric Vehicle', 'name_ar' => 'Z اليكتريك فيكل'),
            92 => array('name_en' => 'Zhongyu', 'name_ar' => 'تشونغيو'),
            93 => array('name_en' => 'Znen', 'name_ar' => 'زنين'),
            94 => array('name_en' => 'Zongshen', 'name_ar' => 'زونجشين'),
            95 => array('name_en' => 'Zunlong', 'name_ar' => 'زونلونغ'),
            96 => array('name_en' => 'Others', 'name_ar' => 'أخرى'),
        );
        $subcategory = SubCategory::find(32);
         
        foreach ($data as $item){
            $brand = Brand::create($item);

            
                $subcategory->brands()->attach($brand);
               
         
        }
        



        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
