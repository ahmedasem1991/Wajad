<?php

namespace App\Nova;

use App\Permission;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\Banners;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use KossShtukert\LaravelNovaSelect2\Select2;
use NovaErrorField\Errors;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class Permissions extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Permission';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Roles';
    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'role_id',
        'permission_slug',
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
            ID::make()->sortable(),
            Text::make('Name', 'name')->creationRules([
                'required', 'min:6'
            ]),
            Text::make('Dispaly Name', 'display_name')->creationRules([
                'required', 'min:6'
            ]),
            Text::make('Description', 'description')->creationRules([
                'required', 'min:6'
            ]),
            Text::make('Group', 'group')->creationRules([
                'required', 'min:6'
            ]),



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
    return  '<img class="sidebar-icon" src="/images/icons/qrcode.svg" style="height:22px;width:22px;margin=10px" />';
    }
}
