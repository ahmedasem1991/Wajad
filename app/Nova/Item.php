<?php

namespace App\Nova;

use App\Nova\User;
use App\SubCategory;
use App\Nova\Metrics\Items;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use ClassicO\NovaMediaLibrary\MediaField;
use KossShtukert\LaravelNovaSelect2\Select2;
use NovaErrorField\Errors;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Item extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Item';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Resources';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
        'details',
        'status',
        'owner_id',
        'model_id',
        'color_id',
        'sub_category_id',
        'brand_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    public static $searchRelations = [
        'owner' => ['name', 'email', 'mobile_number'],
        'brand' => [ 'name_en', 'name_ar'],
        'subcategory' => [ 'name_en', 'name_ar'],
        'model' => [ 'name_en', 'name_ar'],
        'color' => [ 'name_en', 'name_ar'],
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
            Text::make('Title')->rules([
                'required', 'min:2'
            ]),
            Textarea::make('Details')->rules([
                'required', 'min:2'
            ]),

            NovaBelongsToDepend::make('Subcategory', 'subcategory', \App\Nova\SubCategory::class)
                ->placeholder('Select Sub category')
                ->options(\App\SubCategory::with('brands')->get())
                ->rules('required'),

            NovaBelongsToDepend::make('Brand','brand',\App\Nova\Brand::class)
                ->placeholder('Select Brand')
                ->optionsResolve(function ($subcategory) {
                    return $subcategory->brands;
                })
                ->rules('required')
                ->dependsOn('Subcategory'),

            NovaBelongsToDepend::make('Model', 'model', \App\Nova\Model::class)
                ->placeholder('Optional Placeholder')
                ->optionsResolve(function ($brand) {
                    return $brand->models()->get(['id', 'name_en']);
                })
                ->rules('required')
                ->dependsOn('Brand'),

            Select2::make('Owner', 'owner_id')
                ->sortable()
                ->options(\App\User::normalusers()->get()->pluck('name', 'id'))
                ->displayUsingLabels()
                ->rules('required')
                ->showAsLink(User::class)
                ->configuration([
                    'placeholder'             => __('Choose an option'),
                    'allowClear'              => true,
                    'minimumResultsForSearch' => 1,
                    'multiple'                => false,
                ]),
            NovaBelongsToDepend::make('Color')
                ->placeholder('Color')
                ->options(\App\Color::all()),

            Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Size is: 5 MB. <b>Images Will Be Resized</b> </p>')
                ->asHtml()->hideFromDetail(),

            MediaField::make('Item Image', 'images')->listing(),

            HasOne::make('Qrcode', 'qrcode', Qrcode::class),
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
            new Items()
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
        return  '<img class="sidebar-icon" src="/images/icons/sales.png" style="height:22px;width:22px;margin=10px" />';
    }
}
