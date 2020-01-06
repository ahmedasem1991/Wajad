<?php

namespace App\NovaCorporate;

use App\Nova\Metrics\Categories;
use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\HasMany;
use App\Nova\Resource;
class Category extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Category';
    public static $displayInNavigation = false;
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

            Text::make('Category English Name', 'name_en')
                ->creationRules([
                    'required', 'max:255', 'min:3', 'unique:categories,name_en'
                ])
                ->updateRules([
                    'max:255', 'min:3', 'unique:categories,name_en,{{resourceId}}'
                ]),

            Text::make('Category Arabic Name', 'name_ar')
                ->creationRules([
                    'required', 'max:255', 'min:3', 'unique:categories,name_ar'
                ])
                ->updateRules([
                    'max:255', 'min:3', 'unique:categories,name_ar,{{resourceId}}'
                ]),

            Toggle::make('Use Default Image For Items In Category', 'items_has_default_image')->color('#4099de'),

            Image::make('Category Items Default Image', 'default_image')->rules([
                'required_if:has_default_image,1', 'image', 'mimes:jpeg,bmp,png', 'max:5012'
            ])
                ->disk('public')
                ->path('/images/categories/images')
                ->disableDownload()
                ->prunable()
                ->deletable(),

            Image::make('Category Icon', 'icon')
                ->creationRules([
                    'required', 'image', 'mimes:jpeg,bmp,png', 'max:5012'
                ])
                ->updateRules([
                    'image', 'mimes:jpeg,bmp,png', 'max:5012'
                ])
                ->disk('public')
                ->path('/images/categories/icons')
                ->disableDownload()
                ->prunable()
                ->deletable(),

            HasMany::make('Item', 'items', \App\Nova\Item::class),
            HasMany::make('Brand', 'brands', \App\Nova\Brand::class)
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
}
