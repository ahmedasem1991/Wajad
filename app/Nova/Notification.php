<?php

namespace App\Nova;

use App\User;
use App\Nova\Category;
use App\Nova\Resource;
use NovaErrorField\Errors;
use Laravel\Nova\Fields\ID;
use App\Nova\Metrics\Brands;
use App\Nova\Metrics\Colors;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\MultiselectField\Multiselect;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class Notification extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\AdminNotification';
    public static $group = 'Notification';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'body';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'body',
        'send_to',
        'users',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('notifications')) ? true : false;
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
            Errors::make(),
            ID::make()->sortable(),
            Textarea::make('Body', 'body')->creationRules([
                'required', 'min:2'
            ]) ,

            RadioButton::make('Send To', 'send_to')
                ->options([
                 //   2 => 'As Advertisement',
                    0 => 'All Users',
                    1 => 'Special Users',
                   
                ])->default(0),

            NovaDependencyContainer::make([
                Multiselect::make('Users')
                    ->options(
                        User::normalusers()->get()->pluck('name','id')->toArray()
                    )
                    ->placeholder('Select Users')
                    ->reorderable(),
            ])->dependsOn('send_to', '1'),
/*
            NovaDependencyContainer::make([
                NovaBelongsToDepend::make('Country', 'country', \App\Nova\Country::class)
                ->placeholder('Select Country')
                ->options(\App\Country::with('regions')->get())
                ->hideFromIndex()
                ->rules('required'),

            NovaBelongsToDepend::make('Region', 'region', \App\Nova\Area::class)
                ->placeholder('Select Region')
                ->options(\App\Region::with('cities')->get())
                ->hideFromIndex()
                ->rules('required'),

            NovaBelongsToDepend::make('City', 'city', \App\Nova\City::class)
                ->placeholder('Select City')
                ->optionsResolve(function ($region) {
                    return $region->cities;
                })
                ->dependsOn('region')
                ->hideFromIndex()
                ->rules('required'),

           ])->dependsOn('send_to', '0'),
*/
            Multiselect::make('Send By','send_by')
                ->options(
                    [
                        'email'=>'Email',
                        'fcm'=>'FCM',
                        'sms'=>'SMS',
                    ]
                )
                ->creationRules('required')

                ->placeholder('Select Options')
                ->reorderable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \App\Http\Request  $request
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
        return  '<img class="sidebar-icon" src="/images/icons/notification.png" style="height:22px;width:22px;margin=10px" />';
    }
    public   function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
