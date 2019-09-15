<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Naif\MapAddress\MapAddress;
use Spatie\NovaTranslatable\Translatable;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Image;

class Corporate extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Corporate';


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

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
            Text::make('Corporate English Name', 'name_en')->rules(
                'required',
                'string',
                'max:255',
                'min:6'
            ),
            Text::make('Corporate Arabic Name', 'name_ar')->rules(
                'required',
                'string',
                'max:255',
                'min:6'
            ),
            Trix::make('Corporate English Details', 'details_en')
                ->rules(
                    'required',
                    'string',
                    'max:255',
                    'min:6'
                ),
            Trix::make('Corporate Arabic Details', 'details_ar')
                ->rules(
                    'required',
                    'string',
                    'max:255',
                    'min:6'
                ),
            Text::make('Corporate English Address', 'address_en')->rules(
                'required',
                'string',
                'max:255',
                'min:6'
            ),
            Text::make('Corporate Arabic Address', 'address_ar')->rules(
                'required',
                'string',
                'max:255',
                'min:6'
            ),
            Image::make('Corporate Image', 'image')->creationRules(
                'required',
                'image',
                'mimes:jpeg,bmp,png',
                'max:5012'
            )->updateRules(
                'image',
                'mimes:jpeg,bmp,png',
                'max:5012'
            )->disk('public')->disableDownload()->deletable(false),

            BelongsToMany::make('User', 'users', User::class)->rules('required'),
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
