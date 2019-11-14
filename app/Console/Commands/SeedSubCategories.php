<?php

namespace App\Console\Commands;

use App\Category;
use Illuminate\Console\Command;

class SeedSubCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:subcategories';

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
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->subcategories()->create([
                'name_en' => 'Lorem ipsum dolor sit amet.',
                'name_ar' => 'Lorem ipsum dolor sit amet.',
                'description_en' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem blanditiis ut tenetur velit tempora laborum?',
                'description_ar' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem blanditiis ut tenetur velit tempora laborum?',
                'image' => '/images/subcategories/default-subcategory.png',
            ]);
        }

        $this->info('|------------------------------------------|');
        $this->info('| Seeding Sub Categories Done Successfully |');
        $this->info('|------------------------------------------|');
    }
}
