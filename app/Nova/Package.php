<?php

namespace App\Nova;

use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Naif\Paypal\Paypal;
use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\MorphMany;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Fields\BelongsToMany;

class Package extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Package';

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
    public function title()
    {
        return $this->name_en . ' - ' . $this->quantity. ' QR Code' ;

    }

    public function subtitle()
{
   return  $this->price . ' $';
}

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'price',
        'type',
        'quantity',
        'period',
        'is_active',
        'incrementally',
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
            Text::make('Package English Name', 'name_en')
                ->rules(['required', 'string', 'max:255']),

            Text::make('Package Arabic Name', 'name_ar')
                ->rules(['required', 'string', 'max:255']),

            Textarea::make('Package English Description', 'description_en')
                ->rules(
                    ['required', 'string']
                )->hideFromIndex(),

            Textarea::make('Package Arabic Description', 'description_ar')
                ->rules(
                    ['required', 'string']
                )->hideFromIndex(),
                Heading::make('<p class="text-info" style="margin-left:20%"> Package  Price In <big>USD</big> Unit </p>')
                ->asHtml(),
            Number::make('Package Price', 'price')
                ->rules(['required', 'integer']),
                Heading::make('<p class="text-info" style="margin-left:20%"> Package Period In <big>Days</big>  </p>')
                ->asHtml(),
            Number::make('Package Period', 'period')->rules('required'),
            Number::make('Quantity Of QR Codes', 'quantity')->rules('required'),

            Toggle::make('Show Package', 'is_active')->color('#4099de'),
            Toggle::make('Incrementally Available', 'incrementally')->color('#4099de'),

            NovaDependencyContainer::make([
                Number::make('Max Number of Increments', 'max_increments')->min(1)->rules('required'),
            ])->dependsOn('incrementally', 1),

            RadioButton::make('Type')
                ->options([
                    1 => 'Single Assign',
                    2 => 'Multi Assign',
                ])->default(1), // optional

            // BelongsToMany::make('Product', 'products', Product::class)
            //     ->fields(function () {
            //         return [
            //             Number::make('Quantity Of Products In Package', 'product_count')
            //                 ->rules(['required', 'integer'])
            //         ];
            //     })->hideWhenUpdating(),

            HasMany::make('Subscription')
                ->hideWhenUpdating(),

            // MorphMany::make('PackageProductMedia', 'media', PackageProductMedia::class)
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
            // (new Paypal())

            //     //you can set days to retrieve transacitons
            //     (new Paypal())->days(3)  //default last 5 days

            //     //you can specifivy how many transactions to retreive
            //     (new Paypal())->count(5) //default is 10 transactions

            //     //you can hide PayPal logo
            //     (new Paypal())->hideLogo(true) //default false

            //    //Example for all options
            //    (new Paypal())->days(3)->count(5)->hideLogo(true)
        ];
    }

    /**
     * Get the filters available for the resource.
     *-
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
        return  '<img class="sidebar-icon" src="/images/icons/package.png" style="height:22px;width:22px;margin=10px" />';
    }
}
