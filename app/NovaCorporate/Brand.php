<?php

namespace App\NovaCorporate;

use App\NovaCorporate\Category;
use App\Nova\Metrics\Brands;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Brand extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Brand';
    public static $group = 'Categories';
    public static $displayInNavigation = false;
    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name_en';

    //  public  function title()
    // {
    //    return $this->name_en. ' - ' . $this->subcategory->name_en;
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
            Text::make('Brand English Name', 'name_en')->creationRules([
                'required', 'min:6'
            ]),
            Text::make('Brand Arabic Name', 'name_ar')->creationRules([
                'required', 'min:6'
            ]),
            Textarea::make('Brand English Body', 'description_en')->creationRules([
                'required', 'min:6'
            ]),
            Textarea::make('Brand Arabic Body', 'description_ar')->creationRules([
                'required', 'min:6'
            ]),
            Image::make('Brand Image', 'image')
                ->creationRules([
                    'required', 'image', 'mimes:jpeg,bmp,png', 'max:5012'
                ])
                ->disk('public')
                ->path('images/brands')
                ->prunable()
                ->deletable(),
            // BelongsTo::make('Subcategory'),
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
            new Brands()
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
