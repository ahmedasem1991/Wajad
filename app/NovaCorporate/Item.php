<?php

namespace App\NovaCorporate;
use App\Color;
use App\Nova\Resource;
use App\Nova\Metrics\Items;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use NovaErrorField\Errors;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Laravel\Nova\Http\Requests\NovaRequest;
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
    public static $group = 'Classes';
    public static $displayInNavigation = false;

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
    public static function availableForNavigation(Request $request)
    {
        return  (Auth()->User()->hasPermissionTo('view items')) ? true :false;
    }

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

            NovaBelongsToDepend::make('Brand')
                ->placeholder('Optional Placeholder')
                ->options(\App\Brand::all())
                ->rules('required'),

            NovaBelongsToDepend::make('Model', 'model')
                ->placeholder('Optional Placeholder')
                ->optionsResolve(function ($brand) {
                    return $brand->models()->get(['id','name_en']);
                })
                ->rules('required')
                ->dependsOn('Brand'),

            NovaBelongsToDepend::make('Owner', 'owner', User::class)
                ->placeholder('Owner')
                ->options(\App\User::all()),

            NovaBelongsToDepend::make('Color','color','App\Nova\Color')
                ->placeholder('Color')
                ->options(Color::all()),

            HasMany::make('Images', 'images', ItemImage::class),

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

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereIn('owner_id',Auth()->user()->corporate->users->pluck('id'));
    }

    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/sales.png" style="height:22px;width:22px;margin=10px" />';
    }
    public  function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
