<?php

namespace App\Nova;

use App\Item;
use App\User;
use ClassicO\NovaMediaLibrary\MediaField;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\Banners;
use App\Services\Filters\ItemFilters\Found;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use KossShtukert\LaravelNovaSelect2\Select2;
use NovaErrorField\Errors;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use App\Services\Filters\ItemFilters\Lost;

class Banner extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Banner';

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
    public static $title = 'type';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'type',
        'image',
        'url',
        'item_id',
        'user_id',
        'clicks',
        'start_date',
        'end_date',
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
            Errors::make(),
            Number::make('Order', 'order')
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            ID::make()->sortable(),
            DateTime::make('Start Date')->rules(['required']),
            DateTime::make('End Date')->rules(['required', 'after:start_date']),
            Text::make('Status', function () {
                if ($this->notStarted())
                    return "<span style='color:orange'> Not Started </span>";
                else if ($this->ended())
                    return "<span style='color:red'>Expired </span>";
                else
                    return "<span style='color:green'> Active </span>";
            })->asHtml()
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            Number::make('Number of clicks', 'clicks')
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            Select::make('Banner Type', 'type')->options([
                "ads" => "Advertisement",
                "url" => "URL",
                "item" => "Item"
            ])->rules(['required', 'in:ads,url,item'])->displayUsingLabels(),

            NovaDependencyContainer::make([
                Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Size is: 5 MB. <b>Images Will Be Resized</b> </p>')
                    ->asHtml()->hideFromDetail(),
                MediaField::make('Advertise Image', 'image')
                    ->nullable(),
            ])->dependsOn('type', 'ads'),

            NovaDependencyContainer::make([
                Text::make('URL Link', 'url')->nullable(),
                Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Size is: 5 MB. <b>Images Will Be Resized</b> </p>')
                    ->asHtml()->hideFromDetail(),
                MediaField::make('Url Image', 'image')
                    ->nullable()
            ])->dependsOn('type', 'url'),

            NovaDependencyContainer::make([
                Select::make('Item Type', 'item_type')->options([
                    0 => 'Lost',
                    1 => 'Found'
                ])->displayUsingLabels()->hideFromDetail()->hideFromIndex(),

                NovaBelongsToDepend::make('User', 'user', 'App\Nova\NormalUser')
                    ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                    ->placeholder('Select User')
                    ->options(User::NormalUsers()->get())
                    ->rules('required'),

                NovaBelongsToDepend::make('Item', 'item', \App\Nova\Item::class)
                    ->placeholder('Select Item')

                    ->optionsResolve(function ($user) {
                        return $user->items()->get();
                    })
                    ->rules('required')
                    ->dependsOn('User'),
            ])->dependsOn('type', 'item'),
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
            new Banners(),
        ];
    }

    public static function fill(NovaRequest $request, $model)
    {

        if ($request->has('item_type')) {

            $request->offsetUnset('item_type');
        }

        return parent::fill($request, $model);
    }

    public static function fillForUpdate(NovaRequest $request, $model)
    {

        if ($request->has('item_type')) {

            $request->offsetUnset('item_type');
        }

        return parent::fill($request, $model);
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
        return  '<img class="sidebar-icon" src="/images/icons/slider.png" style="height:22px;width:22px;margin=10px" />';
    }
}
