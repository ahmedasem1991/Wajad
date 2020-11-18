<?php

namespace App\Nova;
use App\User;
use App\Corporate;
use App\Nova\Resource;
use NovaErrorField\Errors;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Http\Requests\NovaRequest;
use KossShtukert\LaravelNovaSelect2\Select2;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
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

    public static $searchRelations = [
        'corporate' => [ 'name_en'],
        'user' => ['name', 'email', 'mobile_number'],
        'package' => ['name_en'],
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

            Select::make('Subscriber Type', 'subscriber')->options([
                '1' => 'User',
                '2' => 'Corporate',
            ])->rules('required')
                ->displayUsingLabels(),

            NovaDependencyContainer::make([
                Select2::make('User Email','user_id')
                    ->sortable()
                    ->hideFromDetail()
                    ->options(User::normalusers()->get()->pluck('email', 'id'))
                    ->rules('required_if:subscriber,1')
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
                    ->rules('required_if:subscriber,2')
                    ->configuration([
                        'placeholder'             => __('Choose an option'),
                        'allowClear'              => true,
                        'minimumResultsForSearch' => 1,
                        'multiple'                => false,
                    ])

            ])->hideFromDetail()->dependsOn('subscriber', '2'),

            BelongsTo::make('User')->hideWhenCreating()->hideWhenUpdating(),
            BelongsTo::make('Corporate')->hideWhenCreating()->hideWhenUpdating(),

            BelongsTo::make('Package')
                ->rules('required'),

               Text::make('Package Price',function( $request){
                if($request->package)
                return   $request->package->price;
                else
                return false;
               })
               ->hideWhenCreating()
               ->hideWhenUpdating(),


               Text::make('QR Codes Quantity',function( $request){
                if($request->package)
                return   $request->package->quantity;
                return false;
               })
               ->hideWhenCreating()
               ->hideWhenUpdating(),



               Text::make('QR Codes Available Period',function( $request){
                if($request->package)
                return   $request->package->period;
                return false;
               })
               ->hideWhenCreating()
               ->hideWhenUpdating(),

          

            DateTime::make('Subscription Date','created_at')
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            RadioButton::make('Subscription From','created_from')
                ->options([
                    'web' => 'web',
                ])->default('web')
                ->hideFromIndex()
                ->hideFromDetail(), // optional,

            Text::make('Subscription From','created_from')
                ->hideWhenCreating()
                ->hideWhenUpdating(),

               

        ];
    }

    // public static function fill(NovaRequest $request, $model)
    // {
    //     // if ($request->input('owner_releated_to_system')) {
    //     //     $request->offsetUnset('owner_releated_to_system');
    //     // }

    //     // if ($request->input('founder_releated_to_system')) {
    //     //     $request->offsetUnset('founder_releated_to_system');
    //     // }

    //     // return parent::fill($request, $model);
    // }

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
    public  function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
