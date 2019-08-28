<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Image;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Post';
    public static $group = 'Posts';
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
            Text::make('Title'),
            Textarea::make('description'),
            Boolean::make('Is Found','Status'),
            DateTime::make('Losted At')->hideFromIndex(),
            DateTime::make('Founded At')->hideFromIndex(),
            NovaBelongsToDepend::make('User', 'publisher')
            ->placeholder('User') // Add this just if you want to customize the placeholder
            ->options(\App\User::all()),
             NovaBelongsToDepend::make('Item')
            ->placeholder('Item')
            ->optionsResolve(function ($user) {
                $user_items = [];
                $user_items_with_qrcode = $user->items()
                    ->Has('qrcode')
                    ->get();
                foreach ($user_items_with_qrcode as $user_item_with_qrcode) {
                    array_push($user_items, $user_item_with_qrcode);
                }
                return $user_items;
            })->dependsOn('publisher')->nullable(),




            // BelongsTo::make('Item'),
            // BelongsTo::make('User','publisher'),
            HasMany::make('Images','images',\App\Nova\PostImages::class)
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
