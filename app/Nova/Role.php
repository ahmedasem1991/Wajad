<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Naif\Toggle\Toggle;
use NovaErrorField\Errors;
use OwenMelbz\RadioField\RadioButton;
use Pktharindu\NovaPermissions\Checkboxes;

// use Silvanite\NovaFieldCheckboxes\Checkboxes;

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

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('view roles')) ? true : false;
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
    public function fields(Request $request)
    {
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

            RadioButton::make('Group Control', 'mobile_group')
                ->options([
                    0 => 'Web Group',
                    1 => 'Mobile Group',
                    2 => 'default',
                ])
                ->stack()

                ->default(2) // optional
                ->rules('required'),

            Heading::make('<p class="text-info" style="margin-left:20%"></p>')->asHtml(),

            NovaDependencyContainer::make([
                Checkboxes::make(__('Permissions'), 'permissions')
                    ->withGroups()
                    ->options(collect(config('novapermissionsAdmin.permissions'))
                        ->map(function ($permission, $key) {
                            return [
                                'group' => ucfirst($permission['group']),
                                'option' => $key,
                                'label' => $permission['display_name'],
                                'description' => $permission['description'],
                            ];
                        })->groupBy('group')->toArray()),

            ])->dependsOn('mobile_group', 0),
            Text::make(__('Users'), function () {
                return \count($this->users);
            })->onlyOnIndex(),

            NovaDependencyContainer::make([
                Toggle::make('Default Group'),
                Toggle::make('Auto Approve'),
                Number::make('Limitation Of Posts Number', 'limitation_of_posts')->min(1)->max(10000)->step(1)->rules('required'),
                Number::make('Posts Active Period In Days', 'posts_period')->min(1)->max(10000)->step(1)->rules('required'),
                Number::make('Number Of Free QRCodes', 'free_qrcodes')->min(1)->max(100)->step(1)->rules('required'),
                Number::make('Available Period OF Free QRCodes', 'available_period_qrcodes')->min(1)->max(100)->step(1)->rules('required'),
            ])->dependsOn('mobile_group', 1),
            BelongsToMany::make(__('Users'), 'users', config('novapermissionsAdmin.userResource', \App\Nova\AllUser::class))->searchable(),
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

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
