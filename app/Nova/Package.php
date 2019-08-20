<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use App\Package as PackageModel;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\BelongsToMany;
use Smartappco\GenerateUniqueQrUrl\GenerateUniqueQrUrl;

class Package extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Package';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';
    public function title()
    {
        return $this->id . ' - ' . $this->name;
    }

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = false;
    

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Wajad Products And Packages';

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
            Text::make('Package Name', 'name')->rules(['required', 'string', 'max:255']),

            Trix::make('Package Description', 'description')->rules(
                ['required', 'string']
            )->hideFromIndex(),

            Number::make('QR-CODES | Products Per Packege', 'products_per_package')->rules(
                ['required', 'integer']
            ),

            Number::make('Package Price', 'price')->rules(['required', 'integer'])->hideWhenUpdating(),

            Select::make('Select Package Period', 'period')->options(
                PackageModel::packagesPeriod()
            )->displayUsingLabels(),


            BelongsToMany::make('Products', 'products', \App\Nova\Products::class)->hideWhenUpdating(),

            MorphMany::make('PackageProductMedia', 'media', PackageProductMedia::class)
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
}
