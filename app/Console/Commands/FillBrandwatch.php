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
                'name_en' => 'Adly',
                'name_ar' => 'Adly',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            1 => array(
                'name_en' => 'Aeon',
                'name_ar' => 'Aeon',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            2 => array(
                'name_en' => 'AJS',
                'name_ar' => 'AJS',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            3 => array(
                'name_en' => 'Aprilia',
                'name_ar' => 'Aprilia',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            4 => array(
                'name_en' => 'Askoll',
                'name_ar' => 'Askoll',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            5 => array(
                'name_en' => 'Avangan',
                'name_ar' => 'Avangan',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            6 => array(
                'name_en' => 'Bajaj',
                'name_ar' => 'Bajaj',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            7 => array(
                'name_en' => 'Baotian',
                'name_ar' => 'Baotian',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            8 => array(
                'name_en' => 'Bashan',
                'name_ar' => 'Bashan',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            9 => array(
                'name_en' => 'Beeline',
                'name_ar' => 'Beeline',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            10 => array(
                'name_en' => 'Benelli',
                'name_ar' => 'Benelli',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            11 => array(
                'name_en' => 'Benzhou',
                'name_ar' => 'Benzhou',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            12 => array(
                'name_en' => 'Beta',
                'name_ar' => 'Beta',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            13 => array(
                'name_en' => 'BMW',
                'name_ar' => 'BMW',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            14 => array(
                'name_en' => 'Boom',
                'name_ar' => 'Boom',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            15 => array(
                'name_en' => 'Čezeta',
                'name_ar' => 'Čezeta',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            16 => array(
                'name_en' => 'CFMOTO',
                'name_ar' => 'CFMOTO',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            17 => array(
                'name_en' => 'Chicago Scooter',
                'name_ar' => 'Chicago Scooter',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            18 => array(
                'name_en' => 'CPI',
                'name_ar' => 'CPI',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            19 => array(
                'name_en' => 'Daelim',
                'name_ar' => 'Daelim',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            20 => array(
                'name_en' => 'Dafra',
                'name_ar' => 'Dafra',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            21 => array(
                'name_en' => 'Derbi',
                'name_ar' => 'Derbi',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            22 => array(
                'name_en' => 'Doohan',
                'name_ar' => 'Doohan',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            23 => array(
                'name_en' => 'Explorer',
                'name_ar' => 'Explorer',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            24 => array(
                'name_en' => 'fluid freeride.com',
                'name_ar' => 'fluid freeride.com',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            25 => array(
                'name_en' => 'Forza',
                'name_ar' => 'Forza',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            26 => array(
                'name_en' => 'Garelli',
                'name_ar' => 'Garelli',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            27 => array(
                'name_en' => 'Genuine',
                'name_ar' => 'Genuine',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            28 => array(
                'name_en' => 'Gilera',
                'name_ar' => 'Gilera',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            29 => array(
                'name_en' => 'Gogoro',
                'name_ar' => 'Gogoro',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            30 => array(
                'name_en' => 'GOVECS',
                'name_ar' => 'GOVECS',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            31 => array(
                'name_en' => 'Haojin',
                'name_ar' => 'Haojin',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            32 => array(
                'name_en' => 'Hartford',
                'name_ar' => 'Hartford',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            33 => array(
                'name_en' => 'Hero',
                'name_ar' => 'Hero',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            34 => array(
                'name_en' => 'Honda',
                'name_ar' => 'Honda',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            35 => array(
                'name_en' => 'Hunted Scooters',
                'name_ar' => 'Hunted Scooters',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            36 => array(
                'name_en' => 'Hyosung',
                'name_ar' => 'Hyosung',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            37 => array(
                'name_en' => 'Jialing',
                'name_ar' => 'Jialing',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            38 => array(
                'name_en' => 'Jianshe',
                'name_ar' => 'Jianshe',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            39 => array(
                'name_en' => 'JMI',
                'name_ar' => 'JMI',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            40 => array(
                'name_en' => 'Jonway',
                'name_ar' => 'Jonway',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            41 => array(
                'name_en' => 'Junak',
                'name_ar' => 'Junak',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            42 => array(
                'name_en' => 'Kawasaki',
                'name_ar' => 'Kawasaki',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            43 => array(
                'name_en' => 'Keeway',
                'name_ar' => 'Keeway',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            44 => array(
                'name_en' => 'KSR Moto',
                'name_ar' => 'KSR Moto',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            45 => array(
                'name_en' => 'Kymco',
                'name_ar' => 'Kymco',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            46 => array(
                'name_en' => 'Lambretta',
                'name_ar' => 'Lambretta',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            47 => array(
                'name_en' => 'Lance',
                'name_ar' => 'Lance',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            48 => array(
                'name_en' => 'Lifan',
                'name_ar' => 'Lifan',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            49 => array(
                'name_en' => 'Linlong',
                'name_ar' => 'Linlong',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            50 => array(
                'name_en' => 'Lohia Machinery Limited',
                'name_ar' => 'Lohia Machinery Limited',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            51 => array(
                'name_en' => 'Loncin',
                'name_ar' => 'Loncin',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            52 => array(
                'name_en' => 'Longjia',
                'name_ar' => 'Longjia',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            53 => array(
                'name_en' => 'Mahindra',
                'name_ar' => 'Mahindra',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            54 => array(
                'name_en' => 'Malaguti',
                'name_ar' => 'Malaguti',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            55 => array(
                'name_en' => 'MBK',
                'name_ar' => 'MBK',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            56 => array(
                'name_en' => 'Modenas',
                'name_ar' => 'Modenas',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            57 => array(
                'name_en' => 'Moto',
                'name_ar' => 'Moto',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            58 => array(
                'name_en' => 'Motorini',
                'name_ar' => 'Motorini',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            59 => array(
                'name_en' => 'MZ',
                'name_ar' => 'MZ',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            60 => array(
                'name_en' => 'NIU',
                'name_ar' => 'NIU',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            61 => array(
                'name_en' => 'Peugeot',
                'name_ar' => 'Peugeot',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            62 => array(
                'name_en' => 'PGO Scooters',
                'name_ar' => 'PGO Scooters',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            63 => array(
                'name_en' => 'Piaggio',
                'name_ar' => 'Piaggio',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            64 => array(
                'name_en' => 'Qianjiang',
                'name_ar' => 'Qianjiang',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            65 => array(
                'name_en' => 'Qingqi',
                'name_ar' => 'Qingqi',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            66 => array(
                'name_en' => 'Raine Scooters',
                'name_ar' => 'Raine Scooters',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            67 => array(
                'name_en' => 'Rex',
                'name_ar' => 'Rex',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            68 => array(
                'name_en' => 'Rieju',
                'name_ar' => 'Rieju',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            69 => array(
                'name_en' => 'Rivero',
                'name_ar' => 'Rivero',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            70 => array(
                'name_en' => 'Royal Alloy',
                'name_ar' => 'Royal Alloy',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            71 => array(
                'name_en' => 'RUSI',
                'name_ar' => 'RUSI',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            72 => array(
                'name_en' => 'Scomadi',
                'name_ar' => 'Scomadi',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            73 => array(
                'name_en' => 'SFM (formerly Sachs)',
                'name_ar' => 'SFM (formerly Sachs)',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            74 => array(
                'name_en' => 'Shineray',
                'name_ar' => 'Shineray',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            75 => array(
                'name_en' => 'Sinnis',
                'name_ar' => 'Sinnis',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            76 => array(
                'name_en' => 'Solifer',
                'name_ar' => 'Solifer',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            77 => array(
                'name_en' => 'Suzuki',
                'name_ar' => 'Suzuki',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            78 => array(
                'name_en' => 'SYM',
                'name_ar' => 'SYM',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            79 => array(
                'name_en' => 'Taiwan Golden Bee ',
                'name_ar' => 'Taiwan Golden Bee ',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            80 => array(
                'name_en' => 'Tao Motors',
                'name_ar' => 'Tao Motors',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            81 => array(
                'name_en' => 'Tell',
                'name_ar' => 'Tell',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            82 => array(
                'name_en' => 'TNT',
                'name_ar' => 'TNT',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            83 => array(
                'name_en' => 'TVS',
                'name_ar' => 'TVS',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            84 => array(
                'name_en' => 'Ujet',
                'name_ar' => 'Ujet',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            85 => array(
                'name_en' => 'Unu',
                'name_ar' => 'Unu',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            86 => array(
                'name_en' => 'Veleco',
                'name_ar' => 'Veleco',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            87 => array(
                'name_en' => 'Vespa',
                'name_ar' => 'Vespa',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            88 => array(
                'name_en' => 'Vitacci',
                'name_ar' => 'Vitacci',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            89 => array(
                'name_en' => 'Vostok',
                'name_ar' => 'Vostok',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            90 => array(
                'name_en' => 'Wasp Scooters',
                'name_ar' => 'Wasp Scooters',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            91 => array(
                'name_en' => 'Wolf Brand Scooters',
                'name_ar' => 'Wolf Brand Scooters',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            92 => array(
                'name_en' => 'Xingyue',
                'name_ar' => 'Xingyue',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            93 => array(
                'name_en' => 'Yamaha',
                'name_ar' => 'Yamaha',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            94 => array(
                'name_en' => 'Yiying',
                'name_ar' => 'Yiying',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            95 => array(
                'name_en' => 'Z Electric Vehicle',
                'name_ar' => 'Z Electric Vehicle',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            96 => array(
                'name_en' => 'Zhongyu',
                'name_ar' => 'Zhongyu',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            97 => array(
                'name_en' => 'Znen',
                'name_ar' => 'Znen',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            98 => array(
                'name_en' => 'Zongshen',
                'name_ar' => 'Zongshen',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
            99 => array(
                'name_en' => 'Zunlong',
                'name_ar' => 'Zunlong',
                'image' => '/images/action-028-detail-more-info-others-512-1606640534-QDKIL.png'
            ),
        );
      //  $subcategory = SubCategory::find(4);
        //foreach ($category->subcategories as $subcategory){
            
            // $subcategory->brands()->createMany($data);
        //}
        $subcategory = SubCategory::find(32);
        $subcategory->brands()->createMany($data);
         



        $this->info('|----------------------------------|');
        $this->info('| Seeding Brands Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
