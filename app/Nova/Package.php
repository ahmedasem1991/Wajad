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
use Smartappco\QrcodeGenerator\QrcodeGenerator;

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
    public static $icon = '
    <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path fill="var(--sidebar-icon)" d="M4.06 13a8 8 0 0 0 5.18 6.51A18.5 18.5 0 0 1 8.02 13H4.06zm0-2h3.96a18.5 18.5 0 0 1 1.22-6.51A8 8 0 0 0 4.06 11zm15.88 0a8 8 0 0 0-5.18-6.51A18.5 18.5 0 0 1 15.98 11h3.96zm0 2h-3.96a18.5 18.5 0 0 1-1.22 6.51A8 8 0 0 0 19.94 13zm-9.92 0c.16 3.95 1.23 7 1.98 7s1.82-3.05 1.98-7h-3.96zm0-2h3.96c-.16-3.95-1.23-7-1.98-7s-1.82 3.05-1.98 7zM12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"
        />
        </svg>
        ';

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
            Number::make('QR Codes Per Package', 'products_per_package')->rules(
                ['required', 'integer']
            ),
            Number::make('Package Price', 'price')->rules(['required', 'integer'])->hideWhenUpdating(),
            Select::make('Select Package Period', 'period')->options(
                PackageModel::packagesPeriod()
            )->displayUsingLabels(),
            BelongsToMany::make('Products', 'products', \App\Nova\Products::class)
                ->fields(function () {
                    return [
                        QrcodeGenerator::make('Relation CODE', 'package_product_name')
                            ->creationRules('required', 'string', 'min:15', 'unique:package_product_table,package_product_name')
                            ->length(15)
                            ->hideWhenUpdating()
                            ->help(
                                'Please Use Our Own Generator To Generate Unique URL For Each QR CODE'
                            )
                    ];
                })
                ->hideWhenUpdating(),

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
