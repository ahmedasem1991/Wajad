<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Package;
use App\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackageProductCommand extends Command
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
                'name' => 'Platinum Package',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, quaerat eaque. Commodi quis voluptatibus, neque nostrum, quia corrupti delectus sapiente nam, ipsam officia dolores blanditiis.',
                'products_per_package' => rand(1, 6),
                'price' => rand(50, 500),
                'period' => rand(1, 4)
            ],
            [
                'name' => 'Golden Package',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, quaerat eaque. Commodi quis voluptatibus, neque nostrum, quia corrupti delectus sapiente nam, ipsam officia dolores blanditiis.',
                'products_per_package' => rand(1, 6),
                'price' => rand(50, 500),
                'period' => rand(1, 4)
            ],
            [
                'name' => 'Silver Package',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, quaerat eaque. Commodi quis voluptatibus, neque nostrum, quia corrupti delectus sapiente nam, ipsam officia dolores blanditiis.',
                'products_per_package' => rand(1, 6),
                'price' => rand(50, 500),
                'period' => rand(1, 4)
            ],
            [
                'name' => 'Bronze Package',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, quaerat eaque. Commodi quis voluptatibus, neque nostrum, quia corrupti delectus sapiente nam, ipsam officia dolores blanditiis.',
                'products_per_package' => rand(1, 6),
                'price' => rand(50, 500),
                'period' => rand(1, 4)
            ]
        ];

        foreach ($packages as $package) {
            $packages = Package::create($package);
        }

        $products = [
            [
                'title' => 	'Sticker',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente dolores beatae doloribus veritatis recusandae necessitatibus soluta repellendus corrupti. Quod ut delectus quia, voluptatibus exercitationem officia!'
            ],
            [
                'title' => 'Magnetic', 
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente dolores beatae doloribus veritatis recusandae necessitatibus soluta repellendus corrupti. Quod ut delectus quia, voluptatibus exercitationem officia!'
            ],
            [
                'title' => 'Necklace',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente dolores beatae doloribus veritatis recusandae necessitatibus soluta repellendus corrupti. Quod ut delectus quia, voluptatibus exercitationem officia!'
            ],
            [
                'title' => 'Bracelet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente dolores beatae doloribus veritatis recusandae necessitatibus soluta repellendus corrupti. Quod ut delectus quia, voluptatibus exercitationem officia!'
            ]
        ];

        foreach ($products as $product) {
            $products = Products::create($product);
        }

        foreach (Package::all() as $package) {
            $package->products()->attach(Products::first() , [
                'package_product_name' => Str::random(15)
            ]);
        }
    }
}
