<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class Keyword extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Keyword::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'keyword';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'keyword', 'searches',
    ];

    public static $group = 'Resources';

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('keywords')) ? true : false;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('keyword'),
            Number::make('searches')->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            // new \Tightenco\NovaGoogleAnalytics\PageViewsMetric,
            // new \Tightenco\NovaGoogleAnalytics\VisitorsMetric,
            // new \Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard,
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function icon()
    {
        return '<img class="sidebar-icon" src="/images/icons/chart.png" style="height:22px;width:22px;margin=10px" />';
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
