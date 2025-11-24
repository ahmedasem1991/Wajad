<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use NovaErrorField\Errors;

class Page extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Page::class;

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
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title_en',
        'title_ar',
        'body_en',
        'body_ar',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('pages')) ? true : false;
    }

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
            Text::make('key')->creationRules([
                'required', 'min:3', 'unique:pages,key',
            ])->readonly(),

            Text::make('Title En')->rules([
                'required', 'min:3',
            ]),
            Text::make('Title Ar')->rules([
                'required', 'min:3',
            ]),
            TextArea::make('Body En')->rules([
                'required', 'min:3',
            ]),
            TextArea::make('Body Ar')->rules([
                'required', 'min:3',
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

    public static function icon()
    {
        return '<img class="sidebar-icon" src="/images/icons/settings.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
