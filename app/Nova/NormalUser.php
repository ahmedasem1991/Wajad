<?php

namespace App\Nova;

use Bissolli\NovaPhoneField\PhoneNumber;
use Illuminate\Http\Request;
use KossShtukert\LaravelNovaSelect2\Select2;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use NovaErrorField\Errors;

class NormalUser extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\User';

    public static $displayInNavigation = false;

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
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'email',
        'default_distance_unit',
        'type',
        'status',
        'mobile_country_id',
        'corporate_id',
        'city_id',
        'posts_number',
        'device_token',
        'mobile_number',
        'receive_emails',
        'receive_push_notifications',
        'is_mobile_number_verified',
        'email_verified_at',
        'image',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('view users')) ? true : false;
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

            Gravatar::make(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{ resourceId }}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),
            PhoneNumber::make('Mobile Number', 'mobile_number')
                ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
                ->onlyCustomFormats(),

            Boolean::make('Active', 'status')
                ->trueValue(1)
                ->falseValue(0)
                ->withMeta(['value' => $this->status ?? true]),

            HasMany::make('Activity', 'activities', Activity::class)
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Select2::make('Type', 'type')
                ->options([
                    '1' => 'User',
                ])->default('1')
                ->displayUsingLabels()->creationRules('required')
                ->updateRules('required'),
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
        return [
            new DownloadExcel,
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->Normalusers();
    }

    public static function icon()
    {
        return '<img class="sidebar-icon" src="/images/icons/users.png" style="height:22px;width:22px;margin=10px" />';
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
