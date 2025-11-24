<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaField;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use NovaErrorField\Errors;

class PackageProductMedia extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\PackageProductMedia::class;

    public static $displayInNavigation = false;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Packages & Subscription';

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
        'media_path',
        'package_product_media_type',
        'package_product_media_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Errors::make(),
            ID::make()->sortable(),
            Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Size is: 5 MB. <b>Images Will Be Resized</b> </p>')
                ->asHtml()->hideFromDetail(),
            MediaField::make('Image / Icon', 'media_path'),

            MorphTo::make('package_product_media')->types([
                Package::class,
                Product::class,
            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
