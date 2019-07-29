<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use OptimistDigital\NovaPageManager\Template;

class AboutUs extends Template
{
    public static $type = 'page';
    public static $name = 'about-us';
    public static $seo = false;

    public function fields(Request $request): array
    {
        return [
            Text::make('Title')->sortable(),'title'
        ];
    }
}
