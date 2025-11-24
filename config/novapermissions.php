<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'userModel' => App\User::class,

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'userResource' => App\Nova\User::class,

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'roleResourceGroup' => 'Users Management',

    'table_names' => [
        'roles' => 'roles',

        'role_permission' => 'role_permission',

        'role_user' => 'role_user',
    ],
    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => [
        // /////////////Users///////////////
        'view users' => [
            'display_name' => 'View users',
            'description' => 'Can view users',
            'group' => 'Users',
        ],

        'create users' => [
            'display_name' => 'Create users',
            'description' => 'Can create users',
            'group' => 'Users',
        ],

        'edit users' => [
            'display_name' => 'Edit users',
            'description' => 'Can edit users',
            'group' => 'Users',
        ],

        'delete users' => [
            'display_name' => 'Delete users',
            'description' => 'Can delete users',
            'group' => 'Users',
        ],
        // /////////////Brands///////////////
        // 'view brands' => [
        //     'display_name' => 'View brands',
        //     'description'  => 'Can view brands',
        //     'group'        => 'Brands',
        // ],

        // 'create brands' => [
        //     'display_name' => 'Create brands',
        //     'description'  => 'Can create brands',
        //     'group'        => 'Brands',
        // ],

        // 'edit brands' => [
        //     'display_name' => 'Edit brands',
        //     'description'  => 'Can edit brands',
        //     'group'        => 'Brands',
        // ],

        // 'delete brands' => [
        //     'display_name' => 'Delete brands',
        //     'description'  => 'Can delete brands',
        //     'group'        => 'Brands',
        // ],
        // /////////////Categories///////////////
        //  'view categories' => [
        //     'display_name' => 'View categories',
        //     'description'  => 'Can view categories',
        //     'group'        => 'Categories',
        // ],

        // 'create categories' => [
        //     'display_name' => 'Create categories',
        //     'description'  => 'Can create categories',
        //     'group'        => 'Categories',
        // ],

        // 'edit categories' => [
        //     'display_name' => 'Edit categories',
        //     'description'  => 'Can edit categories',
        //     'group'        => 'Categories',
        // ],

        // 'delete categories' => [
        //     'display_name' => 'Delete categories',
        //     'description'  => 'Can delete categories',
        //     'group'        => 'Categories',
        // ],
        //  ///////////////colors///////////////
        //  'view colors' => [
        //     'display_name' => 'View colors',
        //     'description'  => 'Can view colors',
        //     'group'        => 'Colors',
        // ],

        // 'create colors' => [
        //     'display_name' => 'Create colors',
        //     'description'  => 'Can create colors',
        //     'group'        => 'Colors',
        // ],

        // 'edit colors' => [
        //     'display_name' => 'Edit colors',
        //     'description'  => 'Can edit colors',
        //     'group'        => 'Colors',
        // ],

        // 'delete colors' => [
        //     'display_name' => 'Delete colors',
        //     'description'  => 'Can delete colors',
        //     'group'        => 'Colors',
        // ],
        //  ///////////////Models///////////////
        //  'view models' => [
        //     'display_name' => 'View models',
        //     'description'  => 'Can view models',
        //     'group'        => 'Models',
        // ],

        // 'create models' => [
        //     'display_name' => 'Create models',
        //     'description'  => 'Can create models',
        //     'group'        => 'Models',
        // ],

        // 'edit models' => [
        //     'display_name' => 'Edit models',
        //     'description'  => 'Can edit models',
        //     'group'        => 'Models',
        // ],

        // 'delete models' => [
        //     'display_name' => 'Delete models',
        //     'description'  => 'Can delete models',
        //     'group'        => 'Models',
        // ],
        //  ///////////////Sub Categories///////////////
        //  'view sub categories' => [
        //     'display_name' => 'View sub categories',
        //     'description'  => 'Can view sub categories',
        //     'group'        => 'Sub categories',
        // ],

        // 'create sub categories' => [
        //     'display_name' => 'Create sub categories',
        //     'description'  => 'Can create sub categories',
        //     'group'        => 'Sub categories',
        // ],

        // 'edit sub categories' => [
        //     'display_name' => 'Edit sub categories',
        //     'description'  => 'Can edit sub categories',
        //     'group'        => 'Sub categories',
        // ],

        // 'delete sub categories' => [
        //     'display_name' => 'Delete sub categories',
        //     'description'  => 'Can delete sub categories',
        //     'group'        => 'Sub categories',
        // ],
        //  ///////////////Areas///////////////
        //  'view areas' => [
        //     'display_name' => 'View areas',
        //     'description'  => 'Can view areas',
        //     'group'        => 'Areas',
        // ],

        // 'create areas' => [
        //     'display_name' => 'Create areas',
        //     'description'  => 'Can create areas',
        //     'group'        => 'Areas',
        // ],

        // 'edit areas' => [
        //     'display_name' => 'Edit areas',
        //     'description'  => 'Can edit areas',
        //     'group'        => 'Areas',
        // ],

        // 'delete areas' => [
        //     'display_name' => 'Delete areas',
        //     'description'  => 'Can delete areas',
        //     'group'        => 'Areas',
        // ],
        //  ///////////////Cities///////////////
        //  'view cities' => [
        //     'display_name' => 'View cities',
        //     'description'  => 'Can view cities',
        //     'group'        => 'Cities',
        // ],

        // 'create cities' => [
        //     'display_name' => 'Create cities',
        //     'description'  => 'Can create cities',
        //     'group'        => 'Cities',
        // ],

        // 'edit cities' => [
        //     'display_name' => 'Edit cities',
        //     'description'  => 'Can edit cities',
        //     'group'        => 'Cities',
        // ],

        // 'delete cities' => [
        //     'display_name' => 'Delete cities',
        //     'description'  => 'Can delete cities',
        //     'group'        => 'Cities',
        // ],
        //  ///////////////Countries///////////////
        //  'view countries' => [
        //     'display_name' => 'View countries',
        //     'description'  => 'Can view countries',
        //     'group'        => 'Countries',
        // ],

        // 'create countries' => [
        //     'display_name' => 'Create countries',
        //     'description'  => 'Can create countries',
        //     'group'        => 'Countries',
        // ],

        // 'edit countries' => [
        //     'display_name' => 'Edit countries',
        //     'description'  => 'Can edit countries',
        //     'group'        => 'Countries',
        // ],

        // 'delete countries' => [
        //     'display_name' => 'Delete countries',
        //     'description'  => 'Can delete countries',
        //     'group'        => 'Countries',
        // ],
        // /////////////Activities///////////////
        'view activities' => [
            'display_name' => 'View activities',
            'description' => 'Can view activities',
            'group' => 'Activities',
        ],

        'view notifications' => [
            'display_name' => 'View notifications',
            'description' => 'Can view notifications',
            'group' => 'Notifications',
        ],

        'view settings' => [
            'display_name' => 'View settings',
            'description' => 'Can view settings',
            'group' => 'Settings',
        ],

        'view visits' => [
            'display_name' => 'View visits',
            'description' => 'Can view visits',
            'group' => 'Visits',
        ],

        // 'create activities' => [
        //     'display_name' => 'Create activities',
        //     'description'  => 'Can create activities',
        //     'group'        => 'Activities',
        // ],

        // 'edit activities' => [
        //     'display_name' => 'Edit activities',
        //     'description'  => 'Can edit activities',
        //     'group'        => 'Activities',
        // ],

        // 'delete activities' => [
        //     'display_name' => 'Delete activities',
        //     'description'  => 'Can delete activities',
        //     'group'        => 'Activities',
        // ],
        // /////////////Banners///////////////
        //  'view banners' => [
        //     'display_name' => 'View banners',
        //     'description'  => 'Can view banners',
        //     'group'        => 'Banners',
        // ],

        // 'create banners' => [
        //     'display_name' => 'Create banners',
        //     'description'  => 'Can create banners',
        //     'group'        => 'Banners',
        // ],

        // 'edit banners' => [
        //     'display_name' => 'Edit banners',
        //     'description'  => 'Can edit banners',
        //     'group'        => 'Banners',
        // ],

        // 'delete banners' => [
        //     'display_name' => 'Delete banners',
        //     'description'  => 'Can delete banners',
        //     'group'        => 'Banners',
        // ],
        //  ///////////////Corporates///////////////
        //  'view corporates' => [
        //     'display_name' => 'View corporates',
        //     'description'  => 'Can view corporates',
        //     'group'        => 'Corporates',
        // ],

        // 'create corporates' => [
        //     'display_name' => 'Create corporates',
        //     'description'  => 'Can create corporates',
        //     'group'        => 'Corporates',
        // ],

        // 'edit corporates' => [
        //     'display_name' => 'Edit corporates',
        //     'description'  => 'Can edit corporates',
        //     'group'        => 'Corporates',
        // ],

        // 'delete corporates' => [
        //     'display_name' => 'Delete corporates',
        //     'description'  => 'Can delete corporates',
        //     'group'        => 'Corporates',
        // ],
        // /////////////Items///////////////
        'view items' => [
            'display_name' => 'View items',
            'description' => 'Can view items',
            'group' => 'Items',
        ],

        'create items' => [
            'display_name' => 'Create items',
            'description' => 'Can create items',
            'group' => 'Items',
        ],

        'edit items' => [
            'display_name' => 'Edit items',
            'description' => 'Can edit items',
            'group' => 'Items',
        ],

        'delete items' => [
            'display_name' => 'Delete items',
            'description' => 'Can delete items',
            'group' => 'Items',
        ],
        // /////////////Packages///////////////
        'packages' => [
            'display_name' => 'View packages',
            'description' => 'Can view packages',
            'group' => 'Packages',
        ],
        'subscription' => [
            'display_name' => 'View subscription',
            'description' => 'Can view subscription',
            'group' => 'Packages',
        ],

        // 'create packages' => [
        //     'display_name' => 'Create packages',
        //     'description'  => 'Can create packages',
        //     'group'        => 'Packages',
        // ],

        // 'edit packages' => [
        //     'display_name' => 'Edit packages',
        //     'description'  => 'Can edit packages',
        //     'group'        => 'Packages',
        // ],

        // 'delete packages' => [
        //     'display_name' => 'Delete packages',
        //     'description'  => 'Can delete packages',
        //     'group'        => 'Packages',
        // ],
        // /////////////Posts///////////////
        'view posts' => [
            'display_name' => 'View posts',
            'description' => 'Can view posts',
            'group' => 'Posts',
        ],

        'create posts' => [
            'display_name' => 'Create posts',
            'description' => 'Can create posts',
            'group' => 'Posts',
        ],

        'edit posts' => [
            'display_name' => 'Edit posts',
            'description' => 'Can edit posts',
            'group' => 'Posts',
        ],

        'delete posts' => [
            'display_name' => 'Delete posts',
            'description' => 'Can delete posts',
            'group' => 'Posts',
        ],

        'hidden posts' => [
            'display_name' => 'Hidden posts',
            'description' => 'Can display hidden posts',
            'group' => 'Posts',
        ],

        'closed posts' => [
            'display_name' => 'Closed posts',
            'description' => 'Can display closed posts',
            'group' => 'Posts',
        ],
        // /////////////Offices///////////////
        //  'view offices' => [
        //     'display_name' => 'View offices',
        //     'description'  => 'Can view offices',
        //     'group'        => 'Offices',
        // ],

        // 'create offices' => [
        //     'display_name' => 'Create offices',
        //     'description'  => 'Can create offices',
        //     'group'        => 'Offices',
        // ],

        // 'edit offices' => [
        //     'display_name' => 'Edit offices',
        //     'description'  => 'Can edit offices',
        //     'group'        => 'Offices',
        // ],

        // 'delete offices' => [
        //     'display_name' => 'Delete offices',
        //     'description'  => 'Can delete offices',
        //     'group'        => 'Offices',
        // ],
        //  ///////////////Assign QR Code///////////////
        'view assign qr code' => [
            'display_name' => 'View assign qr code',
            'description' => 'Can view assign qr code',
            'group' => 'Assign QR Code',
        ],

        'create assign qr code' => [
            'display_name' => 'Create assign qr code',
            'description' => 'Can create assign qr code',
            'group' => 'Assign QR Code',
        ],

        // /////////////Generate QR Code///////////////
        //  'view generate qr code' => [
        //     'display_name' => 'View generate qr code',
        //     'description'  => 'Can view generate qr code',
        //     'group'        => 'Generate QR Code',
        // ],

        // 'create generate qr code' => [
        //     'display_name' => 'Create generate qr code',
        //     'description'  => 'Can create generate qr code',
        //     'group'        => 'Generate QR Code',
        // ],

        // /////////////QR Code Stock///////////////
        'view stock' => [
            'display_name' => 'View stock',
            'description' => 'Can view stock',
            'group' => 'QR Code Stock',
        ],

        'delete qr code' => [
            'display_name' => 'Delete qr code',
            'description' => 'Can delete qr code',
            'group' => 'QR Code Stock',
        ],
        // /////////////Setting///////////////
        //  'view setting' => [
        //     'display_name' => 'View setting',
        //     'description'  => 'Can view setting',
        //     'group'        => 'Setting',
        // ],

        // 'create setting' => [
        //     'display_name' => 'Create setting',
        //     'description'  => 'Can create setting',
        //     'group'        => 'Setting',
        // ],

        // 'edit setting' => [
        //     'display_name' => 'Edit setting',
        //     'description'  => 'Can edit setting',
        //     'group'        => 'Setting',
        // ],

        // 'delete setting' => [
        //     'display_name' => 'Delete setting',
        //     'description'  => 'Can delete setting',
        //     'group'        => 'Setting',
        // ],
    ],
];
