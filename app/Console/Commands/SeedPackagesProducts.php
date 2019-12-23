<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Package;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeedPackagesProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:pp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Packages And Products';

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
        DB::table('packages')->truncate();
        DB::table('products')->truncate();
        DB::table('package_product_table')->truncate();

        $packages = [
            [
                'name_en' => 'Platinum Package',
                'name_ar' => 'الباقه الفضيه',
                'description_en' => 'Get 25 QrCodes As Sticker To Sticker it on any item to protect it Activated for one year.',
                'description_ar' => 'أحصل علي 25 استيكر يمكنك وضعها علي المنتجات الخاصه بك وحمايتها فعال لمده عام',
                'price' => "1500",
                'quantity' => "1500",
                'period' => '12'
            ],
            [
                'name_en' => 'Gold Package',
                'name_ar' => 'الباقه الذهبيه',
                'description_en' => 'Get 20 QrCodes As Sticker To Sticker it on any item to protect it Activated for one year.',
                'description_ar' => 'أحصل علي 20 استيكر يمكنك وضعها علي المنتجات الخاصه بك وحمايتها فعال لمده عام',
                'price' => "1300",
                'quantity' => "1500",
                'period' => '12'
            ],
            [
                'name_en' => 'Silver Package',
                'name_ar' => 'الباقه الفضيه',
                'description_en' => 'Get 15 QrCodes As Sticker To Sticker it on any item to protect it Activated for one year.',
                'description_ar' => 'أحصل علي 15 استيكر يمكنك وضعها علي المنتجات الخاصه بك وحمايتها فعال لمده عام',
                'price' => "1150",
                'quantity' => "10",
                'period' => '12'
            ],
            [
                'name_en' => 'WJ25TS',
                'name_ar' => 'WJ25TS',
                'description_en' => 'Get 5 Sticker From Wajad Available for one Month',
                'description_ar' => 'أحصل علي 5 استيكر من الوجد فعالين لمده شهر',
                'price' => '250',
                'quantity' => "1500",
                'period' => '1'
            ],
            [
                'name_en' => 'WJ25KN',
                'name_ar' => 'WJ25KN',
                'description_en' => 'Get Necklace From Wajad Available For 6 Month',
                'description_ar' => 'أحصل علي عقد الوجد المميز يمكنك استخدامه لمده 6 شهور',
                'price' => '450',
                'quantity' => "1500",
                'period' => '6'
            ],
        ];
        foreach ($packages as $package) {
            $packages = Package::create($package);
        }
        $this->info('|------------------------------------|');
        $this->info('| Seed Packages |');
        $this->info('|------------------------------------|');

        $products = [
            [
                'name_en' => 'Sticker',
                'name_ar' => 'استيكر',
                'description_en' => 'Wajad Stickers Can Be Used To Protect Any Item By Sticking it on the item!',
                'description_ar' => 'استيكرات الوجد يمكنك استخدامها وحمايه المنتجات الخاصه بك'
            ],
            [
                'name_en' => 'Magnetic',
                'name_ar' => 'مجناتيك',
                'description_en' => 'Wajad Item Can be included in necklace to located the person who ware it suitable for kids!',
                'description_ar' => 'المجناتيك الخاص بالوجده يمكن ارفاقه باى سلسله / عقد لتحديد المكان الحالى للشخص , مناسبه للأطفال'
            ],
            [
                'name_en' => 'Necklace',
                'name_ar' => 'عقد / سلسله',
                'description_en' => 'Wajad Necklace Can located current baby / kid location available in many colors',
                'description_ar' => 'العقد الخاص بالوجد يمكن ارتدائه للأطفال لتحديد مكانهم الحالى'
            ]
        ];

        foreach ($products as $product) {
            $products = Product::create($product);
        }
        $this->info('|------------------------------------|');
        $this->info('| Seed Products |');
        $this->info('|------------------------------------|');

        foreach (Package::all() as $package) {
            foreach (Product::all() as $product) {
                $package->products()->attach($product, [
                    'product_count' => rand(1, 25)
                ]);
            }
        }
    }
}
