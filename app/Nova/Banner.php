<?php

namespace App\Nova;

use App\Item;
use App\User;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\Banners;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use KossShtukert\LaravelNovaSelect2\Select2;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class Banner extends Resource
{
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
    // public static $group = 'Banners';
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
                Image::make('Advertise Image', 'image')
                    ->disk('public')
                    ->path('images/banners')
                    ->prunable()
                    ->nullable()
            ])->dependsOn('type', 'ads'),

            NovaDependencyContainer::make([
                Text::make('URL Link', 'url')->nullable(),
                Image::make('Url Image', 'image')
                    ->disk('public')
                    ->path('images/banners')
                    ->prunable()
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



                // NovaDependencyContainer::make([
                //     NovaBelongsToDepend::make('User', 'user', 'App\Nova\NormalUser')
                //   ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                //       ->placeholder('Select User')
                //       ->options(User::NormalUsers()->get())
                //       ->rules('required_if:item_type,0'),

                //       NovaBelongsToDepend::make('Item', 'item', \App\Nova\Item::class)
                //       ->placeholder('Select Item')

                //       ->optionsResolve(function ($user) {
                //           return $user->items()->lost()->get();
                //       })
                //       ->rules('required_if:item_type,0')
                //      ->dependsOn('User'),

                //   ])->dependsOn('item_type',0),

                //   NovaDependencyContainer::make([
                //     NovaBelongsToDepend::make('User', 'user', 'App\Nova\NormalUser')
                //   ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                //       ->placeholder('Select User')
                //       ->options(User::NormalUsers()->get())
                //       ->rules('required_if:item_type,1'),

                //       NovaBelongsToDepend::make('Item', 'item', \App\Nova\Item::class)
                //       ->placeholder('Select Item')
                //       ->optionsResolve(function ($user) {
                //           return $user->items()->found()->get();
                //       })
                //       ->rules('required_if:item_type,1')
                //      ->dependsOn('user'),

                //   ])->dependsOn('item_type',1),

            ])->dependsOn('type', 'item'),

            //BelongsTo::make('item')->hideWhenCreating()
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
