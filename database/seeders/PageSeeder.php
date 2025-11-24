<?php

namespace Database\Seeders;

use App\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            'about-us',
            'privacy-and-policy',
            'contact-us',
        ];

        DB::table('pages')->truncate();

        foreach ($pages as $page) {
            Page::create([
                'key' => $page,
                'title_en' => 'Lorem ipsum dolor sit amet.',
                'body_en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil ab, dolores vero reiciendis nesciunt ipsa minus cum quae doloribus optio cupiditate fugiat inventore dolorem quasi eaque nobis quibusdam sunt perferendis quaerat odio ex debitis possimus dolor aliquam. Minima, asperiores rerum? Doloremque eius dolorum reiciendis quaerat suscipit temporibus ad exercitationem id excepturi, dicta, voluptatem asperiores fugiat aspernatur et atque adipisci nesciunt alias tempore ut! Placeat necessitatibus nihil adipisci nobis saepe excepturi unde aliquid commodi reiciendis minima odit, iure, consequuntur accusamus officiis! A aperiam tenetur rerum dolorem. Nihil aperiam, exercitationem animi nostrum at quas sunt repudiandae doloribus repellendus accusantium dolores praesentium? Optio sit ab quidem? Eius sapiente quaerat optio sed, expedita nihil velit odit mollitia laborum cum totam provident eligendi magnam asperiores error, praesentium, facere aliquid ut corrupti! Et, provident debitis commodi ad rem magnam molestias corrupti quibusdam sequi distinctio numquam, nesciunt ducimus consequuntur quasi beatae optio, facere ab possimus quos repellendus?',
                'title_ar' => 'Lorem ipsum dolor sit amet.',
                'body_ar' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil ab, dolores vero reiciendis nesciunt ipsa minus cum quae doloribus optio cupiditate fugiat inventore dolorem quasi eaque nobis quibusdam sunt perferendis quaerat odio ex debitis possimus dolor aliquam. Minima, asperiores rerum? Doloremque eius dolorum reiciendis quaerat suscipit temporibus ad exercitationem id excepturi, dicta, voluptatem asperiores fugiat aspernatur et atque adipisci nesciunt alias tempore ut! Placeat necessitatibus nihil adipisci nobis saepe excepturi unde aliquid commodi reiciendis minima odit, iure, consequuntur accusamus officiis! A aperiam tenetur rerum dolorem. Nihil aperiam, exercitationem animi nostrum at quas sunt repudiandae doloribus repellendus accusantium dolores praesentium? Optio sit ab quidem? Eius sapiente quaerat optio sed, expedita nihil velit odit mollitia laborum cum totam provident eligendi magnam asperiores error, praesentium, facere aliquid ut corrupti! Et, provident debitis commodi ad rem magnam molestias corrupti quibusdam sequi distinctio numquam, nesciunt ducimus consequuntur quasi beatae optio, facere ab possimus quos repellendus?',
            ]);
        }
    }
}
