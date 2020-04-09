<?php

namespace App\NovaCorporate;
use App\User;
use App\Corporate;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use KossShtukert\LaravelNovaSelect2\Select2;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Subscription extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Subscription';
    public static $displayInNavigation = true;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Packages';

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
        'subscriber',
        'corporate_id',
        'user_id',
        'package_id',
        'created_from',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static function availableForNavigation(Request $request)
    {
      return  (Auth()->User()->hasPermissionTo('subscription')) ? true :false;
    }
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

          //  Date::make('Start Date', 'start_date')->rules('required'),

           // Date::make('End Date', 'end_date')->hideWhenCreating()->hideWhenUpdating(),




            //BelongsTo::make('User'),
            NovaBelongsToDepend::make('Corporate','corporate','App\Nova\Corporate')
                ->options(\App\Corporate::all())
                ->placeholder('Corporate'),

            NovaBelongsToDepend::make('Package')->rules('required')
                ->options(\App\Package::all())
                ->placeholder('Package'),

            DateTime::make('Created At')
            ->hideWhenUpdating()
            ->hideWhenCreating()

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
    return  '<img class="sidebar-icon" src="/images/icons/rating.png" style="height:22px;width:22px;margin=10px" />';
    }
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query
        ->where('corporate_id',Auth()->user()->corporate->id);
    }
}
