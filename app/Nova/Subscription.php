<?php

namespace App\Nova;
use App\User;
use App\Corporate;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Http\Requests\NovaRequest;
use KossShtukert\LaravelNovaSelect2\Select2;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

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

           Select::make('Subscriber Type', 'subscriber')->options([
            '1' => 'User',
            '2' => 'Corporate',
          ])->rules('required')
           ->displayUsingLabels(),

        NovaDependencyContainer::make([
            Select2::make('User Name','user_id')
            ->sortable()
            ->hideFromDetail()
            ->options(User::normalusers()->get()->pluck('name', 'id'))
           // ->displayUsingLabels()
            ->rules('required_if:subscriber,1')
           // ->showAsLink()
          // ->default(0)
            ->configuration([
                'placeholder'             => __('Choose an option'),
                'allowClear'              => true,
                'minimumResultsForSearch' => 1,
                'multiple'                => false,
            ])

        ]) ->hideFromDetail()->dependsOn('subscriber', '1'),
        NovaDependencyContainer::make([
            Select2::make('Corporate Name','corporate_id')
            ->hideFromDetail()
            ->sortable()
            ->options(Corporate::get()->pluck('name_en','id'))
           // ->displayUsingLabels()
            ->rules('required_if:subscriber,2')
           // ->readonly()
           // ->showAsLink()
            //->default(0)
            ->configuration([
                'placeholder'             => __('Choose an option'),
                'allowClear'              => true,
                'minimumResultsForSearch' => 1,
                'multiple'                => false,
            ])

        ])->hideFromDetail()->dependsOn('subscriber', '2'),

            BelongsTo::make('User')->hideWhenCreating()->hideWhenUpdating(),
            BelongsTo::make('Corporate')->hideWhenCreating()->hideWhenUpdating(),
            BelongsTo::make('Package')->rules('required'),
            DateTime::make('Created At')
            ->hideWhenUpdating()
            ->hideWhenCreating(),
            RadioButton::make('Created From')
            ->options([
                'web' => 'web',
          ])->default('web'), // optional,

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
}
