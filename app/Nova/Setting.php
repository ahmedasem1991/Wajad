<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;

class Setting extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Setting';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Settings';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'key',
        'title',
        'value',
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
            Text::make('Key', 'key')->creationRules([
                'required', 'min:3', 'max:255', 'unique:settings,key'
            ])->readonly(),

            // Text::make('Title', 'title')->rules([
            //     'required', 'min:3', 'max:255', 'unique:settings,key'
            // ]),
            Textarea::make('Value', 'value')->creationRules([
                'required', 'min:6'
            ]),

            Image::make('Image', 'image')->rules([
                'nullable', 'image', 'mimes:jpeg,bmp,png', 'max:5012'
            ])->disk('public')
                ->path('images/pages/')
                ->disableDownload()
                ->deletable(),
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
    public static function icon()
    {
    return  '<img class="sidebar-icon" src="/images/icons/settings.png" style="height:22px;width:22px;margin=10px" />';
    }
}
