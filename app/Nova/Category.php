<?php

namespace App\Nova;

use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use App\Nova\Metrics\Categories;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;

class Category extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Category';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Categories';
    public static $title = 'name_en';


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    // public function title()
    // {
    //     return $this->name_en . ' - ' . $this->name_ar;
    // }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Category English Name', 'name_en')->creationRules([
                'required', 'min:6'
            ]),
            Text::make('Category Arabic Name', 'name_ar')->creationRules([
                'required', 'min:6'
            ]),
            Textarea::make('Category English Body', 'description_en'),
            Textarea::make('Category Arabic Body', 'description_ar'),
            Image::make('Category Image', 'image')
                ->disk('public')
                ->path('images/categories')
                ->prunable()
                ->deletable()
                ->rules('required','dimensions:max_width=100,max_width=100'),
             HasMany::make('Subcategories'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new Categories()
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
    public static function icon()
    {
    return  '<img class="sidebar-icon" src="/images/icons/list.png" style="height:22px;width:22px;margin=10px" />';
    }
}
