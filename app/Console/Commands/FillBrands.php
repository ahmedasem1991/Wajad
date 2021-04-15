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
            0 => array('name_en' => 'Acne Studios', 'name_ar' => 'أكني ستديو'),
            1 => array('name_en' => 'Acqua Limone', 'name_ar' => 'أكوا ليمون'),
            2 => array('name_en' => 'Adika', 'name_ar' => 'إديكا'),
            3 => array('name_en' => 'AKOO', 'name_ar' => 'ايكو'),
            4 => array('name_en' => 'Alain Figaret', 'name_ar' => 'آلان فيغاريت'),
            5 => array('name_en' => 'American Eagle Outfitters', 'name_ar' => 'امريكان ايجل اوتفيترز'),
            6 => array('name_en' => 'André Kim', 'name_ar' => 'أندريه كيم'),
            7 => array('name_en' => 'Anne Fontaine', 'name_ar' => 'آني فونتاني'),
            8 => array('name_en' => 'Anne T. Hill', 'name_ar' => 'آني ت. هيل'),
            9 => array('name_en' => 'Antthony Mark Hankins', 'name_ar' => 'أنثوني مارك هانكينز'),
            10 => array('name_en' => 'Arckiv', 'name_ar' => 'أرككيف'),
            11 => array('name_en' => 'Armoire Officielle', 'name_ar' => 'أرموار أوفيشييلي'),
            12 => array('name_en' => 'Arthur Galan AG', 'name_ar' => 'آرثر غالان إيه جي'),
            13 => array('name_en' => 'Ascot Chang', 'name_ar' => 'أسكوت تشانغ'),
            14 => array('name_en' => 'AussieBum', 'name_ar' => 'اوسيابوم'),
            15 => array('name_en' => 'Bench', 'name_ar' => 'بنش'),
            16 => array('name_en' => 'Bestseller', 'name_ar' => 'بيست سيلر'),
            17 => array('name_en' => 'Beyond Limits Known', 'name_ar' => 'ما وراء الحدود المعروفة'),
            18 => array('name_en' => 'Biba Apparels', 'name_ar' => 'ملابس بيبا'),
            19 => array('name_en' => 'Bivolino', 'name_ar' => 'بيفولينو'),
            20 => array('name_en' => 'Blaze of Sweden', 'name_ar' => 'الحريق السويد'),
            21 => array('name_en' => 'Bllack Noir', 'name_ar' => 'بلاك نوير'),
            22 => array('name_en' => 'Bloch', 'name_ar' => 'بلوخ'),
            23 => array('name_en' => 'Bluenotes', 'name_ar' => 'التعليقات الزرقاء'),
            24 => array('name_en' => 'Bonds', 'name_ar' => 'السندات'),
            25 => array('name_en' => 'Bonia', 'name_ar' => 'بونيا'),
            26 => array('name_en' => 'Bosideng', 'name_ar' => 'بسايدنغ'),
            27 => array('name_en' => 'Boxfresh', 'name_ar' => 'بوكسفريش'),
            28 => array('name_en' => 'Callisti', 'name_ar' => 'كاليستى'),
            29 => array('name_en' => 'Canterbury of New Zealand', 'name_ar' => 'كانتربري من نيوزيلندا'),
            30 => array('name_en' => 'Caraceni', 'name_ar' => 'كاراسيني'),
            31 => array('name_en' => 'Carbrini Sportswear', 'name_ar' => 'كربريني ملابس رياضية'),
            32 => array('name_en' => 'Carlo Palazzi', 'name_ar' => 'كارلو بالازي'),
            33 => array('name_en' => 'Cassidi', 'name_ar' => 'كاسيدي'),
            34 => array('name_en' => 'Castro', 'name_ar' => 'كاسترو'),
            35 => array('name_en' => 'Céline', 'name_ar' => 'سيلين'),
            36 => array('name_en' => 'Cesare Paciotti', 'name_ar' => 'تشيزاري باتشينوتي'),
            37 => array('name_en' => 'China Heilan Group', 'name_ar' => 'مجموعة هيلان الصينية'),
            38 => array('name_en' => 'Cockpit USA', 'name_ar' => 'قمرة القيادة الولايات المتحدة الأمريكية'),
            39 => array('name_en' => 'Comptoir des Cotonniers', 'name_ar' => '10 - شركة كوتونييه'),
            40 => array('name_en' => 'Corneliani', 'name_ar' => 'كورنيلياني'),
            41 => array('name_en' => 'Costume National', 'name_ar' => 'زي الوطنية'),
            42 => array('name_en' => 'Countess Mara', 'name_ar' => 'الكونتسيس مارا'),
            43 => array('name_en' => 'Croc O\' Shirt', 'name_ar' => 'كروك O\' قميص'),
            44 => array('name_en' => 'CuteCircuit', 'name_ar' => 'لطيف الدوائر'),
            45 => array('name_en' => 'Dale of Norway', 'name_ar' => 'Dale of النرويج'),
            46 => array('name_en' => 'Damani Dada', 'name_ar' => 'داماني دادا'),
            47 => array('name_en' => 'Darling London', 'name_ar' => 'دارلينج لندن'),
            48 => array('name_en' => 'Denver Hayes', 'name_ar' => 'دنفر هايز'),
            49 => array('name_en' => 'Desigual', 'name_ar' => 'ديسيجوال'),
            50 => array('name_en' => 'Diesel', 'name_ar' => 'الديزل'),
            51 => array('name_en' => 'Disco Ruined My Life', 'name_ar' => 'ديسكو دمر حياتي'),
            52 => array('name_en' => 'Dolfin Swimwear', 'name_ar' => 'دولفين ملابس السباحة'),
            53 => array('name_en' => 'Dorinha Jeans Wear', 'name_ar' => 'دورينا جينز ارتداء'),
            54 => array('name_en' => 'Duchamp', 'name_ar' => 'دوتشامب'),
            55 => array('name_en' => 'Duvelleroy', 'name_ar' => 'دوفيليروي'),
            56 => array('name_en' => 'Ede & Ravenscroft', 'name_ar' => 'إد ورافنسكروفت'),
            57 => array('name_en' => 'EDUN', 'name_ar' => 'إدون'),
            58 => array('name_en' => 'Elaine Kim', 'name_ar' => 'إلين كيم'),
            59 => array('name_en' => 'Embark', 'name_ar' => 'الشروع'),
            60 => array('name_en' => 'English Eccentrics', 'name_ar' => 'غريبي الأطوار الإنجليزية'),
            61 => array('name_en' => 'Escada', 'name_ar' => 'إسكادا'),
            62 => array('name_en' => 'Esprit clothing', 'name_ar' => 'إسبريت الملابس'),
            63 => array('name_en' => 'Ethan James', 'name_ar' => 'إيثان جيمس'),
            64 => array('name_en' => 'Ethika', 'name_ar' => 'إيتيكا'),
            65 => array('name_en' => 'Fabletics', 'name_ar' => 'افلات'),
            66 => array('name_en' => 'Fashion line', 'name_ar' => 'خط الموضة'),
            67 => array('name_en' => 'Fenchurch', 'name_ar' => 'فينتشيرش'),
            68 => array('name_en' => 'Fendi', 'name_ar' => 'فيندي'),
            69 => array('name_en' => 'Ferdinando Sarmi', 'name_ar' => 'فرديناندو سارمي'),
            70 => array('name_en' => 'Filippa K', 'name_ar' => 'فيليبا ك'),
            71 => array('name_en' => 'Forever Lazy', 'name_ar' => 'إلى الأبد كسول'),
            72 => array('name_en' => 'Fox', 'name_ar' => 'فوكس'),
            73 => array('name_en' => 'French Connection', 'name_ar' => 'اتصال الفرنسية'),
            74 => array('name_en' => 'G2000', 'name_ar' => 'مجموعة 2000'),
            75 => array('name_en' => 'Gant (retailer)', 'name_ar' => 'جانت (بائع تجزئة)'),
            76 => array('name_en' => 'Garage', 'name_ar' => 'المراب'),
            77 => array('name_en' => 'Garanimals', 'name_ar' => 'غارانينمالس'),
            78 => array('name_en' => 'Gebrüder Stitch', 'name_ar' => 'غبرودر ستيتش'),
            79 => array('name_en' => 'Genny', 'name_ar' => 'جينى'),
            80 => array('name_en' => 'Giordano', 'name_ar' => 'جيوردانو'),
            81 => array('name_en' => 'Go International', 'name_ar' => 'الذهاب الدولية'),
            82 => array('name_en' => 'Golf Wang', 'name_ar' => 'جولف وانغ'),
            83 => array('name_en' => 'Grishko', 'name_ar' => 'غريشكو'),
            84 => array('name_en' => 'Groupe Zannier', 'name_ar' => 'مجموعة زانيير'),
            85 => array('name_en' => 'Gunhild', 'name_ar' => 'غونهيلد'),
            86 => array('name_en' => 'Gunne Sax', 'name_ar' => 'غوني ساكس'),
            87 => array('name_en' => 'H&M', 'name_ar' => 'اتش اند ام'),
            88 => array('name_en' => 'Han Kjøbenhavn', 'name_ar' => 'هان كيوبينهافن'),
            89 => array('name_en' => 'Harari', 'name_ar' => 'هراري'),
            90 => array('name_en' => 'Hatley', 'name_ar' => 'هاتلي'),
            91 => array('name_en' => 'Haus Alkire', 'name_ar' => 'هاوس ألكير'),
            92 => array('name_en' => 'Heilan Home', 'name_ar' => 'منزل هيلان'),
            93 => array('name_en' => 'Helmut Lang', 'name_ar' => 'هلموت لانغ'),
            94 => array('name_en' => 'Hervé Leger', 'name_ar' => 'هيرفي ليجيه'),
            95 => array('name_en' => 'Hield', 'name_ar' => 'هيلد'),
            96 => array('name_en' => 'Honigman', 'name_ar' => 'هونيغمان'),
            97 => array('name_en' => 'Indigo palms', 'name_ar' => 'النخيل النيلي'),
            98 => array('name_en' => 'International Sports Clothing', 'name_ar' => 'الملابس الرياضية الدولية'),
            99 => array('name_en' => 'Iron Heart', 'name_ar' => 'قلب حديدي'),
            100 => array('name_en' => 'Izod Lacoste', 'name_ar' => 'ايزود لاكوست'),
            101 => array('name_en' => 'J.Lindeberg', 'name_ar' => 'جي ليندبرغ'),
            102 => array('name_en' => 'Jako', 'name_ar' => 'جاكو'),
            103 => array('name_en' => 'Jean Machine', 'name_ar' => 'جان ماكينة'),
            104 => array('name_en' => 'Jenny Hellström', 'name_ar' => 'جيني هيلستروم'),
            105 => array('name_en' => 'Joe Fresh', 'name_ar' => 'جو فريش'),
            106 => array('name_en' => 'Joseph', 'name_ar' => 'جوزيف'),
            107 => array('name_en' => 'Joykeep Jeans', 'name_ar' => 'جويكي جينز'),
            108 => array('name_en' => 'Karl Kani', 'name_ar' => 'كارل كاني'),
            109 => array('name_en' => 'Karma', 'name_ar' => 'كارما'),
            110 => array('name_en' => 'Ken Done', 'name_ar' => 'كين دون'),
            111 => array('name_en' => 'Kenzo', 'name_ar' => 'كينزو'),
            112 => array('name_en' => 'Khaadi', 'name_ar' => 'خادي'),
            113 => array('name_en' => 'King Apparel', 'name_ar' => 'ملابس الملك'),
            114 => array('name_en' => 'Kiton', 'name_ar' => 'كيتون'),
            115 => array('name_en' => 'Kookai', 'name_ar' => 'كوكاي'),
            116 => array('name_en' => 'Koton', 'name_ar' => 'كوتون'),
            117 => array('name_en' => 'La Bonneterie Cevenole', 'name_ar' => 'لا بونيتيري سفينول'),
            118 => array('name_en' => 'La Martina', 'name_ar' => 'لا مارتينا'),
            119 => array('name_en' => 'La tennis Bensimon', 'name_ar' => 'لا تنس بينسيمون'),
            120 => array('name_en' => 'L\'alpina', 'name_ar' => 'لالبينا'),
            121 => array('name_en' => 'Lanidor', 'name_ar' => 'لانيدور'),
            122 => array('name_en' => 'Larusmiani', 'name_ar' => 'لاروسمياني'),
            123 => array('name_en' => 'Le Château', 'name_ar' => 'لو شاتو'),
            124 => array('name_en' => 'Le Mont Saint Michel', 'name_ar' => 'لو مونت سان ميشيل'),
            125 => array('name_en' => 'Levi Strauss & Co.', 'name_ar' => 'ليفي شتراوس وشركاه'),
            126 => array('name_en' => 'LittleBig', 'name_ar' => 'ليتل بيغ'),
            127 => array('name_en' => 'Loro Piana', 'name_ar' => 'لورو بيانا'),
            128 => array('name_en' => 'Louis Philippe', 'name_ar' => 'لويس فيليب'),
            129 => array('name_en' => 'Lover', 'name_ar' => 'عاشق'),
            130 => array('name_en' => 'Loyandford', 'name_ar' => 'لويايندفورد'),
            131 => array('name_en' => 'Luigi Borrelli', 'name_ar' => 'لويجي بوريللي'),
            132 => array('name_en' => 'Lyle & Scott', 'name_ar' => 'لايل وسكوت'),
            133 => array('name_en' => 'Madonna fashion', 'name_ar' => 'أزياء مادونا'),
            134 => array('name_en' => 'Mallzee', 'name_ar' => 'مالزي'),
            135 => array('name_en' => 'Mandarina Duck', 'name_ar' => 'ماندارينا داك'),
            136 => array('name_en' => 'Mango', 'name_ar' => 'المانجو'),
            137 => array('name_en' => 'Marc O\'Polo', 'name_ar' => 'مارك أوبولو'),
            138 => array('name_en' => 'Marimekko', 'name_ar' => 'ماريميكو'),
            139 => array('name_en' => 'Marina Rinaldi', 'name_ar' => 'مارينا رينالدي'),
            140 => array('name_en' => 'Marithé et François Girbaud', 'name_ar' => 'ماريتي وفرانسوا جربود'),
            141 => array('name_en' => 'Marni', 'name_ar' => 'مارني'),
            142 => array('name_en' => 'Mavi Jeans', 'name_ar' => 'مافي جينز'),
            143 => array('name_en' => 'Max Mara', 'name_ar' => 'ماكس مارا'),
            144 => array('name_en' => 'Max Studio', 'name_ar' => 'ماكس ستوديو'),
            145 => array('name_en' => 'Merc Clothing', 'name_ar' => 'ملابس ميرك'),
            146 => array('name_en' => 'Missoni', 'name_ar' => 'ميسوني'),
            147 => array('name_en' => 'Moods of Norway', 'name_ar' => 'مزاج النرويج'),
            148 => array('name_en' => 'Morgan', 'name_ar' => 'مورغان'),
            149 => array('name_en' => 'Moschino', 'name_ar' => 'موسكينو'),
            150 => array('name_en' => 'Mudd Jeans', 'name_ar' => 'جينز مُود'),
            151 => array('name_en' => 'Nakkna', 'name_ar' => 'ناكنة'),
            152 => array('name_en' => 'Nina Ricci', 'name_ar' => 'نينا ريتشي'),
            153 => array('name_en' => 'Noir', 'name_ar' => 'نوير'),
            154 => array('name_en' => 'Noko Jeans', 'name_ar' => 'جينز نوكو'),
            155 => array('name_en' => 'Norse Projects', 'name_ar' => 'مشاريع نورسي'),
            156 => array('name_en' => 'Nudie Jeans', 'name_ar' => 'نودي جينز'),
            157 => array('name_en' => 'OBEY', 'name_ar' => 'طاعه'),
            158 => array('name_en' => 'Omar Mansoor', 'name_ar' => 'عمر منصور'),
            159 => array('name_en' => 'OnePiece', 'name_ar' => 'قطعة واحدة'),
            160 => array('name_en' => 'Ong Shunmugam', 'name_ar' => 'أونغ شونموغام'),
            161 => array('name_en' => 'Ooji', 'name_ar' => 'أوجي'),
            162 => array('name_en' => 'Pal Zileri', 'name_ar' => 'بال زيليري'),
            163 => array('name_en' => 'Paule Ka', 'name_ar' => 'بول كا'),
            164 => array('name_en' => 'Penshoppe', 'name_ar' => 'بينشوبي'),
            165 => array('name_en' => 'Pepe Jeans', 'name_ar' => 'بيبي جينز'),
            166 => array('name_en' => 'Police', 'name_ar' => 'الشرطه'),
            167 => array('name_en' => 'Polly Flinders', 'name_ar' => 'بولي فلندرز'),
            168 => array('name_en' => 'Project D', 'name_ar' => 'المشروع دال'),
            169 => array('name_en' => 'Real Gold', 'name_ar' => 'الذهب الحقيقي'),
            170 => array('name_en' => 'Reflect-please', 'name_ar' => 'انعكاس من فضلك'),
            171 => array('name_en' => 'Rêve En Vert', 'name_ar' => 'ريف إن فيرت'),
            172 => array('name_en' => 'Rip Curl', 'name_ar' => 'مزق حليقة'),
            173 => array('name_en' => 'Rosasen', 'name_ar' => 'روساسن'),
            174 => array('name_en' => 'Rufskin', 'name_ar' => 'روسكين'),
            175 => array('name_en' => 'SABA', 'name_ar' => 'سابا'),
            176 => array('name_en' => 'Sakis Rouvas Collection', 'name_ar' => 'مجموعة ساكيس روفاس'),
            177 => array('name_en' => 'Salvatore Ferragamo S.p.A.', 'name_ar' => 'سلفاتوري فيراغامو S.p.A.'),
            178 => array('name_en' => 'Takeo Kikuchi', 'name_ar' => 'تشيو كيكوتشي'),
            179 => array('name_en' => 'Others', 'name_ar' => 'أخرى'),
        );
        $subcategory = SubCategory::find(5);
        $subcategory2 = SubCategory::find(6);
        foreach ($data as $item){
            $brand = Brand::create($item);

            
                $subcategory->brands()->attach($brand);
                $subcategory2->brands()->attach($brand);
         
        }
        



        $this->info('|----------------------------------|');
        $this->info('| Seeding Electronics Done Successfully |');
        $this->info('|----------------------------------|');
    }
}
