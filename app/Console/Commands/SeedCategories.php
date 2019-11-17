<?php

namespace App\Console\Commands;

use App\Brand;
use App\Item;
use App\User;
use App\Category;
use App\Model;
use App\SubCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SeedCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Application categories ,sub categories ,Brands , models and items';

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
        DB::transaction(function () {
            DB::table('categories')->delete();
            DB::table('sub_categories')->delete();
            DB::table('brands')->delete();
            DB::table('models')->delete();
            DB::table('items')->delete();
        });
        $Categories = [
            [
                'name_en' => 'Apparel, Shoes & Accessories',
                'name_ar' => 'أحذية، ملابس و اكسسواراتها',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],


            ],
            [
                'name_en' => 'Art, Crafts & Collectables',
                'name_ar' => 'حرف و مقتنيات و فنون',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Baby',
                'name_ar' => 'الطفل',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Beauty',
                'name_ar' => 'الجمال',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Bed & Bath',
                'name_ar' => 'مستلزمات النوم و الاستحمام',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Books',
                'name_ar' => 'كـتـب',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],
            ],

            [
                'name_en' => 'Coins, Stamps & Paper money',
                'name_ar' => 'عملات و طوابع و نقود ورقية',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Computers, IT & Networking',
                'name_ar' => 'كمبيوتر و شبكات و برامج',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [
                    [
                        'name_en' => 'Lap top',
                        'name_ar' => 'لاب توب',
                        'icon' => 'default-icon.png',
                        'category_id' => 8,
                        'created_at' => null,
                        'updated_at' => null,

                        'brands' => [
                            [
                                'name_en' => 'Toshiba',
                                'name_ar' => 'توشيبا',
                                'image' => 'default-icon.png',
                                'sub_category_id' => 1,
                            ],
                            [
                                'name_en' => 'Hp',
                                'name_ar' => 'إتش بي',
                                'image' => 'default-icon.png',
                                'sub_category_id' => 1,
                            ],
                            [
                                'name_en' => 'Dell',
                                'name_ar' => 'ديل',
                                'image' => 'default-icon.png',
                                'sub_category_id' => 1,

                                'models' => [
                                    [
                                        'name_en' => 'Dell XPS 13',
                                        'name_ar' => 'ديل XPS 13',
                                        'image' => 'default-icon.png',
                                        'description_en' => 'CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD',
                                        // 'owner_id' =>  2,
                                        'brand_id' => 3,
                                    ],
                                    [

                                        'name_en' => 'Huawei MateBook 13',
                                        'name_ar' => 'هواوي MateBook 13',
                                        'image' => 'default-icon.png',
                                        'description_en' => 'CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 , Nvidia GeForce MX150 2GB GDDR5 | RAM: 8GB | Screen: 13-inch 1440p (2,160 x 1,440) | Storage: 256GB - 512GB SSD',
                                        // 'owner_id' =>   User::all()->random(1)->first()->id,
                                        'brand_id' => 3,
                                    ],
                                    [
                                        'name_en' => 'HP Spectre x360 (2019)',
                                        'name_ar' => 'HP Spectre x360 (2019)',

                                        'description_en' => 'CPU: Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch full HD (1,920 x 1,080) – UHD (3,840 x 2,160) touchscreen | Storage: 256GB – 2TB PCIe SSD',

                                        'image' => 'default-icon.png',
                                        // 'owner_id' =>   User::all()->random(1)->first()->id,
                                        'brand_id' => 3,
                                    ],
                                    [
                                        'name_en' => 'Apple MacBook Pro (15-inch, 2019)',
                                        'name_ar' => 'Apple MacBook Pro (15-inch, 2019)',
                                        'description_en' => 'CPU: Intel Core i7 – i9 | Graphics: AMD Radeon Pro 555X - Radeon Pro Vega 20, Intel UHD Graphics 630 | RAM: 16GB | Screen: 15.4-inch, (2,880 x 1,800) IPS | Storage: 256GB – 4TB SSD',
                                        //'owner_id' =>  User::all()->random(1)->first()->id,
                                        'brand_id' => 3,
                                    ],
                                ], //end models
                            ],
                        ], //end brands
                    ], //end subcategory
                ]
            ], //end category
            [
                'name_en' => 'Eyewear & Optics',
                'name_ar' => 'البصريات',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Garden & Outdoor',
                'name_ar' => 'مستلزمات الحدائق',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Furniture',
                'name_ar' => 'أثاث',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Electronics',
                'name_ar' => 'الكتـرونيات',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [
                    [
                        'name_en' => 'Cameras',
                        'name_ar' => 'الكاميرات',
                        'icon' => 'default-icon.png',
                        'category_id' => 12,
                        'brands' => [
                            [
                                'name_en' => 'Nicon',
                                'name_ar' => 'نيكون',
                                'image' => 'default-icon.png',
                                'sub_category_id' => 2,
                            ],
                            [
                                'name_en' => 'Canon',
                                'name_ar' => 'كانون',
                                'image' => 'default-icon.png',
                                'sub_category_id' => 2,
                            ],
                            [
                                'name_en' => 'Sony',
                                'name_ar' => 'سوني',
                                'image' => 'default-icon.png',
                                'sub_category_id' => 2,
                                'models' => [
                                    [
                                        'name_en' => 'Sony SA1',
                                        'name_ar' => 'سوني اس اي 1',
                                        'image' => 'default-icon.png',
                                        'brand_id' => 4,
                                        'items' => [
                                            [
                                                'title' => 'Compact Camera',
                                                'details' => 'A compact camera is an inexpensive    entry-level camera for the amateur digital   photographer.',
                                                'owner_id' =>  2,
                                                'model_id' => 5,
                                                'color_id' => 1,
                                                'status' => 1,
                                            ],
                                            [
                                                'title' => 'Zoom Compact Camera',
                                                'details' => 'Compact zoom cameras have a more powerful zoom lens. This means a much greater magnification ability.',
                                                'owner_id' =>  2,
                                                'model_id' => 5,
                                                'color_id' => 1,
                                                'status' => 1,
                                            ],
                                            [
                                                'title' => 'Advanced Compact Cameras',
                                                'details' => 'These are for the more experienced hobbyists. They want more control over their photos than what a regular compact camera provides.',
                                                'owner_id' =>  2,
                                                'model_id' => 5,
                                                'color_id' => 1,
                                                'status' => 0,
                                            ],
                                            [
                                                'title' => 'Adventure Cameras',
                                                'details' => 'They are weatherproof and shockproof, with their lens behind very durable glass. Action cameras are very small, yet offer a lot of versatility and high resolution for their size.',
                                                'owner_id' => 2,
                                                'model_id' => 5,
                                                'color_id' => 1,
                                                'status' => 0,
                                            ],
                                        ],
                                    ]
                                ],
                            ],


                        ],

                    ],
                ],


            ],
            [
                'name_en' => 'Home Appliances',
                'name_ar' => 'الأجهزة المنزلية',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Grocery, Food & Beverages',
                'name_ar' => 'المأكولات و المشروبات',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Kitchen Appliances',
                'name_ar' => 'اجهزة المطبخ',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Gaming',
                'name_ar' => 'ألعاب الفيديو',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Health & Personal Care',
                'name_ar' => 'الصحة و العناية الشخصية',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Music & Movies',
                'name_ar' => 'أفلام و موسيقى',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Jewelry & Accessories',
                'name_ar' => 'مجوهرات و اكسسواراتها',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Toys',
                'name_ar' => 'الألعاب',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Mobile Phones, Tablets & Accessories',
                'name_ar' => 'جوالات، أجهزة تابلت و اكسسواراتها',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Sports & Fitness',
                'name_ar' => 'الرياضة و أدواتها',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Perfumes & Fragrances',
                'name_ar' => 'العطور',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Vehicle Parts & Accessories',
                'name_ar' => 'قطع المركبات و اكسسواراتها',
                'icon' => 'default-icon.png',
                'created_at' => null,
                'updated_at' => null,
                'sub_categories' => [],

            ],



        ];



        foreach ($Categories as $Category) {

            Category::create($Category);

            foreach ($Category['sub_categories'] as $sub_category) {
                logger($sub_category);
                SubCategory::create([
                    'name_en' => $sub_category['name_en'],
                    'name_ar' => $sub_category['name_ar'],
                    'icon' => $sub_category['icon'],
                    'category_id' => $sub_category['category_id'],

                ]);

                if (!empty($sub_category['brands'])) {
                    foreach ($sub_category['brands'] as $brand) {
                        logger($brand);
                        Brand::create($brand);
                        if (!empty($brand['models'])) {
                            foreach ($brand['models'] as $model) {
                                Model::create($model);
                                if (!empty($model['items'])) {
                                    foreach ($model['items'] as $item) {
                                        Item::create([
                                            'title' => $item['title'],
                                            'details' => $item['details'],
                                            'owner_id' => $item['owner_id'],
                                            'model_id' => $item['model_id'],
                                            'color_id' => $item['color_id'],
                                            'status' => $item['status'],
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $this->info('|------------------------------------|');
        $this->info('| Seeding Categories Done Successfully |');
        $this->info('|------------------------------------|');
    }
}
