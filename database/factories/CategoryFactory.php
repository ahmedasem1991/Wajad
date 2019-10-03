<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        [
            'name_en' => 'Apparel, Shoes & Accessories',
            'name_ar' => 'أحذية، ملابس و اكسسواراتها',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Art, Crafts & Collectables',
            'name_ar' => 'حرف و مقتنيات و فنون',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Baby',
            'name_ar' => 'الطفل',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Beauty',
            'name_ar' => 'الجمال',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Bed & Bath',
            'name_ar' => 'مستلزمات النوم و الاستحمام',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Books',
            'name_ar' => 'كـتـب',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Cameras',
            'name_ar' => 'الكاميرات',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Coins, Stamps & Paper money',
            'name_ar' => 'عملات و طوابع و نقود ورقية',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Computers, IT & Networking',
            'name_ar' => 'كمبيوتر و شبكات و برامج',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Eyewear & Optics',
            'name_ar' => 'البصريات',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Garden & Outdoor',
            'name_ar' => 'مستلزمات الحدائق',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Furniture',
            'name_ar' => 'أثاث',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Electronics',
            'name_ar' => 'الكتـرونيات',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Home Appliances',
            'name_ar' => 'الأجهزة المنزلية',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Grocery, Food & Beverages',
            'name_ar' => 'المأكولات و المشروبات',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Kitchen Appliances',
            'name_ar' => 'اجهزة المطبخ',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Gaming',
            'name_ar' => 'ألعاب الفيديو',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Health & Personal Care',
            'name_ar' => 'الصحة و العناية الشخصية',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Music & Movies',
            'name_ar' => 'أفلام و موسيقى',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Jewelry & Accessories',
            'name_ar' => 'مجوهرات و اكسسواراتها',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Toys',
            'name_ar' => 'الألعاب',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Mobile Phones, Tablets & Accessories',
            'name_ar' => 'جوالات، أجهزة تابلت و اكسسواراتها',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Sports & Fitness',
            'name_ar' => 'الرياضة و أدواتها',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Perfumes & Fragrances',
            'name_ar' => 'العطور',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
        [
            'name_en' => 'Vehicle Parts & Accessories',
            'name_ar' => 'قطع المركبات و اكسسواراتها',
            'icon' => 'default-icon.png',
            'created_at' => null,
            'updated_at' => null
        ],
    ];
});
