<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Illuminate\Support\Facades\Storage;
use Spatie\NovaTranslatable\Translatable;
use Epartment\NovaDependencyContainer\HasDependencies;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class Categories extends Resource
{
    use HasDependencies;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Category';
    public static $group = 'Items';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';
    // public function title()
    // {
    //     //  $obj = json_decode($this->title);
    //     //  return $obj['en']; 
    //    return $this->title;
    // }

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

            Translatable::make([
                Text::make('Category Title', 'title')
                    ->creationRules([
                        'required', 'max:255', 'min:3', 'unique:categories,title'
                    ])
                    ->updateRules([
                        'max:255', 'min:3', 'unique:categories,title,{{resourceId}}'
                    ])
            ]),
            
            Boolean::make('Has Default Image', 'has_default_image'),
            
            NovaDependencyContainer::make([
                Image::make('Category Default Image', 'default_image')->rules([
                    'required_if:has_default_image,1', 'image', 'mimes:jpeg,bmp,png', 'max:5012'
                ])
                    ->disk('public')
                    ->path('/images/categories/images')
                    ->disableDownload()
                    ->prunable()
                    ->deletable(),
            ])->dependsOn('has_default_image', true),
            
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

            HasMany::make('Item', 'items', \App\Nova\Item::class)
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
