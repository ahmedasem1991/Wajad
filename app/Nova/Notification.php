<?php

namespace App\Nova;

use App\Nova\Category;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use App\Nova\Metrics\Brands;
use App\Nova\Metrics\Colors;
use App\User;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use NovaErrorField\Errors;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\MultiselectField\Multiselect;
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
<<<<<<< HEAD
            ]) ,
=======
            ]) ->showOnIndex(),
//            ->readMore(),
>>>>>>> 4037349928c7cbe984a64b871f75a4ffe0d5cb78


            RadioButton::make('Send To', 'send_to')
                ->options([
                    0 => 'All Users',
                    1 => 'Special Users',

                ])->default(0), // optional

            NovaDependencyContainer::make([

                Multiselect::make('Users')
                    ->options(
                        User::normalusers()->get()->pluck('name','id')->toArray()
                    )

                    // Optional:
                    ->placeholder('Choose football teams') // Placeholder text
                  //  ->max(4) // Maximum number of items the user can choose
                   // ->saveAsJSON() // Saves value as JSON if the database column is of JSON type
                   // ->optionsLimit(5) // How many items to display at once
                    ->reorderable(), // Allows reordering functionality
                //->singleSelect(), // If you want a searchable single select field


            ])->dependsOn('send_to', '1'),

            Multiselect::make('Send By','send_by')
            ->options(
               [
                   'email'=>'Email',
                   'fcm'=>'FCM',
                   'sms'=>'SMS',
               ]
            )
            ->creationRules('required')

            // Optional:
            ->placeholder('Choose football teams') // Placeholder text
           // ->max(4) // Maximum number of items the user can choose
           // ->saveAsJSON() // Saves value as JSON if the database column is of JSON type
           // ->optionsLimit(5) // How many items to display at once
            ->reorderable(), // Allows reordering functionality
        //->singleSelect(), // If you want a searchable single select field



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
        return [
            //  new Colors()
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
        return  '<img class="sidebar-icon" src="/images/icons/notification.png" style="height:22px;width:22px;margin=10px" />';
    }
}
