<?php

namespace App\NovaCorporate;

use App\Nova\Resource;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
// use Pktharindu\NovaPermissions\Checkboxes;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaErrorField\Errors;
use Silvanite\NovaFieldCheckboxes\Checkboxes;

// use Fourstacks\NovaCheckboxes\Checkboxes;

class Role extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Role::class;

    public static $displayInNavigation = true;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static function group()
    {
        return config('novapermissionsCorporate.roleResourceGroup', 'Other');
    }

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
        'id',
        'slug',
        'name',
        'corporate_id',
        'limitation_of_posts',
        'default_group',
        'auto_approve',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static $with = [
        'users',
    ];

    /**
     * Get the actions available for the resource.
     *
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    /**
     * Get the cards available for the request.
     *
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the fields displayed by the resource.
     *
     *
     * @return array
     */
    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('view roles')) ? true : false;
    }

    public function fields(Request $request)
    {
        $array = [];
        foreach (Auth()->User()->roles as $role) {
            foreach ($role->permissions as $permission) {
                $array[$permission] = $permission;
            }
        }

        return [
            Errors::make(),
            ID::make()->sortable(),

            TextWithSlug::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->slug('slug'),

            Slug::make(__('Slug'), 'slug')
                ->rules('required')
                ->creationRules('unique:roles')
                ->updateRules('unique:roles,slug,{{resourceId}}')
                ->sortable(),

            Checkboxes::make(__('Permissions'), 'permissions')
                ->options($array)
                ->hideFromIndex()
                ->columns(3)
                ->withoutTypeCasting(),

            Text::make(__('Users'), function () {
                return \count($this->users);
            })->onlyOnIndex(),

            BelongsToMany::make(__('Users'), 'users', config('novapermissionsCorporate.userResource', 'App\NovaCorporate\User'))
                ->searchable(),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    public static function label()
    {
        return __('Roles');
    }

    /**
     * Get the lenses available for the resource.
     *
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    public static function singularLabel()
    {
        return __('Role');
    }

    public static function icon()
    {
        return '<img class="sidebar-icon" src="/images/icons/lock.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('corporate_id', Auth()->User()->corporate_id);
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
