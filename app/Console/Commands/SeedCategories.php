<?php

namespace App\Console\Commands;

use App\Category;
use App\Model;
use App\SubCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
                'icon' => 'images/posts/post1.jpg',
                'sub_categories' => [
                    [
                        'name_en' => 'Blouse',
                        'name_ar' => 'بلوزة',
                        'icon' => 'images/posts/post7.jpg',
                        'category_id' => 1,
                        'brands' => [
                            [
                                'name_en' => 'LCWIKIKI',
                                'name_ar' => 'ال سي واى كي كي',
                                'image' => 'images/posts/post7.jpg',

                            ],
                            [
                                'name_en' => 'H&M',
                                'name_ar' => 'اتش اند ام',
                                'image' => 'images/posts/post7.jpg',

                            ],
                            // [
                            //     'name_en' => 'Others',
                            //     'name_ar' => 'اخرى',
                            //     'icon' => 'images/posts/post1.jpg',
                            // ],
                        ],
                    ],
                    [
                        'name_en' => 'shoes',
                        'name_ar' => 'حذاء',
                        'icon' => 'images/posts/post1.jpg',
                        'category_id' => 1,
                        'brands' => [
                            [
                                'name_en' => 'lacoste',
                                'name_ar' => 'لاكوست',
                                'image' => 'images/posts/post7.jpg',

                            ],
                            [
                                'name_en' => 'corocs',
                                'name_ar' => 'كروكس',
                                'image' => 'images/posts/post7.jpg',

                            ],
                            // [
                            //     'name_en' => 'Others',
                            //     'name_ar' => 'اخرى',
                            //     'icon' => 'images/posts/post1.jpg',

                            // ],
                        ],
                    ],
                    // [
                    //     'name_en' => 'Others',
                    //     'name_ar' => 'اخرى',
                    //     'icon' => 'images/posts/post1.jpg',
                    //     'category_id' => 1,
                    // ],
                ],
            ],
            [
                'name_en' => 'Art, Crafts & Collectables',
                'name_ar' => 'حرف و مقتنيات و فنون',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [
                    [
                        'name_en' => 'artifact',
                        'name_ar' => 'تحفة',
                        'icon' => 'images/posts/post1.jpg',
                        'category_id' => 2,
                    ],
                    [
                        'name_en' => 'candlestick',
                        'name_ar' => 'شمعدان',
                        'icon' => 'images/posts/post1.jpg',
                        'category_id' => 2,
                    ],
                    [
                        'name_en' => 'wall clock',
                        'name_ar' => 'ساعة حائط',
                        'icon' => 'images/posts/post1.jpg',
                        'category_id' => 2,
                    ],
                    [
                        'name_en' => 'Antiquities',
                        'name_ar' => 'انتيكات',
                        'icon' => 'images/posts/post1.jpg',
                        'category_id' => 2,
                    ],
                    [
                        'name_en' => 'Estatua',
                        'name_ar' => 'تمثال',
                        'icon' => 'images/posts/post2.jpg',
                        'category_id' => 2,
                    ],
                    [
                        'name_en' => 'Art object',
                        'name_ar' => 'عمل فنى',
                        'icon' => 'images/posts/post2.jpg',
                        'category_id' => 2,
                    ],
                    // [
                    //     'name_en' => 'Others',
                    //     'name_ar' => 'اخرى',
                    //     'icon' => 'images/posts/post3.jpg',
                    //     'category_id' => 2,
                    // ],
                ],
            ],
            [
                'name_en' => 'Baby',
                'name_ar' => 'الطفل',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [
                    [
                        'name_en' => 'kids shampo',
                        'name_ar' => 'شامبو للاطفال',
                        'icon' => 'images/posts/post3.jpg',
                        'category_id' => 3,
                        'brands' => [
                            [
                                'name_en' => 'gohnson',
                                'name_ar' => 'جونسون',
                                'image' => 'images/posts/post7.jpg',

                            ],
                            [
                                'name_en' => 'panten',
                                'name_ar' => 'بانتين',
                                'image' => 'images/posts/post1.jpg',

                            ],
                            [
                                'name_en' => 'sherosa',
                                'name_ar' => 'شيروسا',
                                'image' => 'images/posts/post1.jpg',

                            ],
                        ],
                        [
                            'name_en' => 'kids toys',
                            'name_ar' => 'العاب للاطفال',
                            'icon' => 'images/posts/post4.jpg',
                            'category_id' => 3,
                        ],
                        [
                            'name_en' => 'kids pampers',
                            'name_ar' => 'بامبرز للاطفال',
                            'icon' => 'images/posts/post4.jpg',
                            'category_id' => 3,
                        ],
                        // [
                        //     'name_en' => 'Others',
                        //     'name_ar' => 'اخرى',
                        //     'icon' => 'images/posts/post5.jpg',
                        //     'category_id' => 3,
                        // ],
                    ],
                ],
            ],
            [
                'name_en' => 'Beauty',
                'name_ar' => 'الجمال',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Bed & Bath',
                'name_ar' => 'مستلزمات النوم و الاستحمام',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Books',
                'name_ar' => 'كـتـب',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Coins, Stamps & Paper money',
                'name_ar' => 'عملات و طوابع و نقود ورقية',
                'icon' => 'images/profile/default-profile.png',

                'sub_categories' => [],
            ],
            [
                'name_en' => 'Computers, IT & Networking',
                'name_ar' => 'كمبيوتر و شبكات و برامج',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [
                    [
                        'name_en' => 'Lap top',
                        'name_ar' => 'لاب توب',
                        'icon' => 'images/posts/post6.jpg',
                        'category_id' => 8,
                        'brands' => [
                            [
                                'name_en' => 'Toshiba',
                                'name_ar' => 'توشيبا',
                                'image' => 'images/posts/post2.jpg',

                            ],
                            [
                                'name_en' => 'Hp',
                                'name_ar' => 'إتش بي',
                                'image' => 'images/posts/post2.jpg',

                            ],
                            [
                                'name_en' => 'Dell',
                                'name_ar' => 'ديل',
                                'image' => 'images/posts/post3.jpg',

                                'models' => [
                                    [
                                        'name_en' => 'Dell XPS 13',
                                        'name_ar' => 'ديل XPS 13',
                                        'image' => 'images/posts/post3.jpg',
                                        'description_en' => 'CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD',
                                        // 'owner_id' =>  2,
                                        'brand_id' => 3,
                                    ],
                                    [
                                        'name_en' => 'Huawei MateBook 13',
                                        'name_ar' => 'هواوي MateBook 13',
                                        'image' => 'images/posts/post4.jpg',
                                        'description_en' => 'CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 , Nvidia GeForce MX150 2GB GDDR5 | RAM: 8GB | Screen: 13-inch 1440p (2,160 x 1,440) | Storage: 256GB - 512GB SSD',
                                        // 'owner_id' =>  2,
                                        'brand_id' => 3,
                                    ],
                                    [
                                        'name_en' => 'HP Spectre x360 (2019)',
                                        'name_ar' => 'HP Spectre x360 (2019)',
                                        'description_en' => 'CPU: Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch full HD (1,920 x 1,080) – UHD (3,840 x 2,160) touchscreen | Storage: 256GB – 2TB PCIe SSD',
                                        'image' => 'images/posts/post4.jpg',
                                        // 'owner_id' =>  2,
                                        'brand_id' => 3,
                                    ],
                                    [
                                        'name_en' => 'Apple MacBook Pro (15-inch, 2019)',
                                        'name_ar' => 'Apple MacBook Pro (15-inch, 2019)',
                                        'description_en' => 'CPU: Intel Core i7 – i9 | Graphics: AMD Radeon Pro 555X - Radeon Pro Vega 20, Intel UHD Graphics 630 | RAM: 16GB | Screen: 15.4-inch, (2,880 x 1,800) IPS | Storage: 256GB – 4TB SSD',
                                        // 'owner_id' =>  2,
                                        'brand_id' => 3,
                                    ],
                                ], // end models
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name_en' => 'Eyewear & Optics',
                'name_ar' => 'البصريات',
                'icon' => 'images/profile/default-profile.png',

                'sub_categories' => [],
            ],
            [
                'name_en' => 'Garden & Outdoor',
                'name_ar' => 'مستلزمات الحدائق',
                'icon' => 'images/profile/default-profile.png',

                'sub_categories' => [],
            ],
            [
                'name_en' => 'Furniture',
                'name_ar' => 'أثاث',
                'icon' => 'images/profile/default-profile.png',

                'sub_categories' => [],
            ],
            [
                'name_en' => 'Electronics',
                'name_ar' => 'الكتـرونيات',
                'icon' => 'images/profile/default-profile.png',

                'sub_categories' => [
                    [
                        'name_en' => 'Cameras',
                        'name_ar' => 'الكاميرات',
                        'icon' => 'images/posts/post7.jpg',
                        'category_id' => 12,
                        'brands' => [
                            [
                                'name_en' => 'Nicon',
                                'name_ar' => 'نيكون',
                                'image' => 'images/posts/post5.jpg',

                            ],
                            [
                                'name_en' => 'Canon',
                                'name_ar' => 'كانون',
                                'image' => 'images/posts/post5.jpg',

                            ],
                            [
                                'name_en' => 'Sony',
                                'name_ar' => 'سوني',
                                'image' => 'images/posts/post6.jpg',

                                'models' => [
                                    [
                                        'name_en' => 'Sony SA1',
                                        'name_ar' => 'سوني اس اي 1',
                                        'image' => 'images/posts/post6.jpg',
                                        'brand_id' => 4,
                                        'items' => [
                                            [
                                                'title' => 'Compact Camera',
                                                'details' => 'A compact camera is an inexpensive    entry-level camera for the amateur digital   photographer.',
                                                'owner_id' => 2,
                                                'model_id' => 5,
                                                'color_id' => 1,
                                                'status' => 1,
                                            ],
                                            [
                                                'title' => 'Zoom Compact Camera',
                                                'details' => 'Compact zoom cameras have a more powerful zoom lens. This means a much greater magnification ability.',
                                                'owner_id' => 2,
                                                'model_id' => 5,
                                                'color_id' => 1,
                                                'status' => 1,
                                            ],
                                            [
                                                'title' => 'Advanced Compact Cameras',
                                                'details' => 'These are for the more experienced hobbyists. They want more control over their photos than what a regular compact camera provides.',
                                                'owner_id' => 2,
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
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name_en' => 'Home Appliances',
                'name_ar' => 'الأجهزة المنزلية',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],

            ],
            [
                'name_en' => 'Grocery, Food & Beverages',
                'name_ar' => 'المأكولات و المشروبات',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Kitchen Appliances',
                'name_ar' => 'اجهزة المطبخ',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Gaming',
                'name_ar' => 'ألعاب الفيديو',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Health & Personal Care',
                'name_ar' => 'الصحة و العناية الشخصية',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Music & Movies',
                'name_ar' => 'أفلام و موسيقى',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Jewelry & Accessories',
                'name_ar' => 'مجوهرات و اكسسواراتها',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Toys',
                'name_ar' => 'الألعاب',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Mobile Phones, Tablets & Accessories',
                'name_ar' => 'جوالات، أجهزة تابلت و اكسسواراتها',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Sports & Fitness',
                'name_ar' => 'الرياضة و أدواتها',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Perfumes & Fragrances',
                'name_ar' => 'العطور',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Vehicle Parts & Accessories',
                'name_ar' => 'قطع المركبات و اكسسواراتها',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [],
            ],
            [
                'name_en' => 'Others',
                'name_ar' => 'اخرى',
                'icon' => 'images/profile/default-profile.png',
                'sub_categories' => [
                    [
                        'name_en' => 'Others',
                        'name_ar' => 'اخرى',
                        'icon' => 'images/posts/post7.jpg',
                        'category_id' => 12,
                        'brands' => [
                            [
                                'name_en' => 'Others',
                                'name_ar' => 'اخرى',
                                'image' => 'images/posts/post6.jpg',
                                'models' => [
                                    [
                                        'name_en' => 'Others',
                                        'name_ar' => 'اخرى',
                                        'image' => 'images/posts/post6.jpg',
                                        'brand_id' => 14,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        // foreach ($Categories as $Category) {
        //     $category = Category::create($Category);
        //     if (!empty($Category['sub_categories'])) {
        //         foreach ($Category['sub_categories'] as $sub_category) {
        //             $SubCategory = SubCategory::create([
        //                 'name_en' => $sub_category['name_en'],
        //                 'name_ar' => $sub_category['name_ar'],
        //                 'icon' => $sub_category['icon'],
        //                 'category_id' => $category->id,
        //             ]);

        //             if (!empty($sub_category['brands'])) {
        //                 foreach ($sub_category['brands'] as $brand) {
        //                     $SubCategory->brands()->create($brand);
        //                     if (!empty($brand['models'])) {
        //                         foreach ($brand['models'] as $model) {
        //                             Model::create($model);
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        $this->line('|--------------------------------------------------------------------|');
        $this->line('| Seeding Categories, Subcategories, Brand, Models Done Successfully |');
        $this->line('|--------------------------------------------------------------------|');
    }
}
