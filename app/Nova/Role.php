<?php

namespace App\Nova;

use App\Nova\Resource;
use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Benjaminhirsch\NovaSlugField\Slug;
use Laravel\Nova\Fields\BelongsToMany;
use Pktharindu\NovaPermissions\Checkboxes;
use Laravel\Nova\Http\Requests\NovaRequest;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Pktharindu\NovaPermissions\Role as RoleModel;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
//use Silvanite\NovaFieldCheckboxes\Checkboxes;

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
        return config('novapermissionsAdmin.roleResourceGroup', 'Other');
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
    ];

    public static $with = [
        'users',
    ];

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
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
     * @param \Illuminate\Http\Request $request
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
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function fields(Request $request)
    {
        // logger(collect(config('novapermissions.permissions')) );

        return [
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
                ->withGroups()
                ->options(collect(config('novapermissionsAdmin.permissions'))
                    ->map(function ($permission, $key) {
                        return [
                            'group'        => ucfirst($permission['group']),
                            'option'       => $key,
                            'label'        => $permission['display_name'],
                            'description'  => $permission['description'],
                        ];
                    })->groupBy('group')->toArray()),

            Text::make(__('Users'), function () {
                return \count($this->users);
            })->onlyOnIndex(),
            Toggle::make('Default Group'),
            NovaDependencyContainer::make([
                Number::make('Limitation Of Posts', 'limitation_of_posts')->min(1)->max(10000)->step(1)->rules('required'),
                Toggle::make('Auto Approve'),

            ])->dependsOn('default_group', 1),

            BelongsToMany::make(__('Users'), 'users', config('novapermissionsAdmin.userResource', 'App\Nova\User'))
                ->searchable(),

            // BelongsTo::make('Corporate')
            //     ->nullable(),
            // ->searchable(),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
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
     * @param \Illuminate\Http\Request $request
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
        return  '<img class="sidebar-icon" src="/images/icons/lock.png" style="height:22px;width:22px;margin=10px" />';
    }

    // public static function indexQuery(NovaRequest $request, $query)
    // {
    //    // return $query->whe();
    // }
}
