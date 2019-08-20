<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Smartappco\GenerateUniqueQrUrl\GenerateUniqueQrUrl;

class Products extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Products';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    // public static $title = 'title';

    public function title()
    {
        return $this->id . ' - ' . $this->title;
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
        'id',
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
            Text::make('Product Title', 'title')->rules([
                'required', 'string', 'max:255'
            ]),
            Trix::make('Product Description', 'description')->rules([
                'required', 'string'
            ]),

            BelongsToMany::make('Package', 'packages', \App\Nova\Package::class)
                ->fields(function () {
                    return [
                        GenerateUniqueQrUrl::make('Relation CODE', 'package_product_name')
                            // ->onlyOnForms()
                            ->creationRules('required', 'string', 'min:15', 'unique:package_product_table,package_product_name')
                            ->length(15)
                            ->excludeRules(['Symbols'])->help(
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
}
