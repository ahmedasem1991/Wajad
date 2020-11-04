<?php

namespace App\Nova;


use App\Nova\Metrics\Regions;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;



use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaErrorField\Errors;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Area extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Region';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Locations';


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name_ar';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name_ar',
        'name_en',
        'country_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static $searchRelations = [
        'country' => [ 'name_en', 'name_ar'],
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
            Errors::make(),
            ID::make()->sortable(),
            Text::make('Area Arabic Name', 'name_ar')->rules(['required', 'string', 'max:255']),
            Text::make('Area English Name', 'name_en')->rules(['required', 'string', 'max:255']),
            NovaBelongsToDepend::make('Country')
            ->placeholder('Country')
            ->options(\App\Country::all()),
            HasMany::make('City', 'cities', 'App\Nova\City'),
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
            new Regions()
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
    return  '<img class="sidebar-icon" src="/images/icons/chart.png" style="height:22px;width:22px;margin=10px" />';
    }

    public   function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
