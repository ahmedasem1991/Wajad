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
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
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
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Packages And Products';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        return $this->name_en . ' - ' . $this->name_ar;
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
        'description_ar'
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

            Number::make('Package Price', 'price')
                ->rules(['required', 'integer'])
                ->hideWhenUpdating(),

            Number::make('Package Period', 'period'),

            Boolean::make('Show Package', 'is_active'),

            BelongsToMany::make('Product', 'products', Product::class)
                ->fields(function () {
                    return [
                        Number::make('Number Of Products In Package', 'product_count')
                            ->rules(['required', 'integer'])
                    ];
                })->hideWhenUpdating(),

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
