<?php

namespace App\Nova;

use App\Nova\Metrics\Models;
use ClassicO\NovaMediaLibrary\MediaField;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use NovaErrorField\Errors;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Model extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Model';

    public static $group = 'Categories';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name_en';

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
        'image',
        'brand_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static $searchRelations = [
        'subcategory' => ['name_en', 'name_ar'],
        'brand' => ['name_en', 'name_ar'],
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
            Text::make('Model English Name', 'name_en')->creationRules([
                'required', 'min:2',
            ]),
            Text::make('Model Arabic Name', 'name_ar')->creationRules([
                'required', 'min:2',
            ]),
            Textarea::make('Model English Body', 'description_en'),
            Textarea::make('Model Arabic Body', 'description_ar'),
            Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Dimensions are: <b>100 * 100 Pixels</b> <b>Images Will Be Resized</b> </p>')
                ->asHtml()->hideFromDetail(),
            MediaField::make('Model Image', 'image')
                ->creationRules('required'),

            NovaBelongsToDepend::make('Subcategory', 'subcategory', \App\Nova\SubCategory::class)
                ->placeholder('Select Sub category')
                ->options(\App\SubCategory::with('brands')->get())
                ->rules('required'),

            NovaBelongsToDepend::make('Brand', 'brand', \App\Nova\Brand::class)
                ->placeholder('Select Brand')
                ->optionsResolve(function ($subcategory) {
                    return $subcategory->brands;

                })
                ->rules('required')
                ->dependsOn('Subcategory'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new Models,
        ];
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

    public static function icon()
    {
        return '<img class="sidebar-icon" src="/images/icons/model.png" style="height:22px;width:22px;margin=10px" />';
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
