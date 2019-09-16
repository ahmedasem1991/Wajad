<?php

namespace App\Nova;

use App\Nova\Category;
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

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name_en';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
             BelongsTo::make('Category'),
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
        return [];
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
