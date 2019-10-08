<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Naif\MapAddress\MapAddress;
use App\Nova\Metrics\Corporates;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsToMany;
use Spatie\NovaTranslatable\Translatable;
use GeneaLabs\NovaMapMarkerField\MapMarker;

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
    public static $title = 'name_en';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Corporate And Users';

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

            HasMany::make('Users', 'users'),
            Boolean::make('Active','status'),
            MapMarker::make("Location")
            ->defaultZoom(5)
            ->defaultLatitude(21.4498898)
            ->defaultLongitude(39.4913431)
            ->centerCircle(10000, 'DarkCyan', 1, 0.3),
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
            new Corporates()
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
