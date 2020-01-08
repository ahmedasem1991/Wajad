<?php

namespace App\Nova;

use App\Corporate;
use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use App\Nova\Metrics\NewUsers;
use Laravel\Nova\Fields\Select;
use App\Nova\Metrics\UsersTypes;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Metrics\UsersActivity;
use Laravel\Nova\Fields\BelongsToMany;
use Bissolli\NovaPhoneField\PhoneNumber;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Manmohanjit\BelongsToDependency\BelongsToDependency;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\User';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Users Management';

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
        'posts_limitation',
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

            Gravatar::make(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email'),
            //->updateRules('unique:users,email,{{ resourceId }}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),
            PhoneNumber::make('Mobile Number', 'mobile_number')
                ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
                ->onlyCustomFormats(),
            HasMany::make('Items'),
            Toggle::make('Active', 'status'),
            //  Boolean::make('Show My Data','show_my_data'),


            // CashierResourceTool::make()->onlyOnDetail(),

            HasMany::make('Activity', 'activities')
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            HasMany::make('Subscription')
                ->hideWhenUpdating(),
            Select::make('Type', 'type')->options([

                '2' => 'Corpoare Admin',
                //  '4' => 'Corporate User',
                '1' => 'Normal User',

            ])->displayUsingLabels(),

            Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Type Is Corpoare Admin.</p>')->asHtml()->hideFromDetail(),

            NovaBelongsToDepend::make('Corporate', 'corporate', 'App\Nova\Corporate')
                ->placeholder('Corporate')
                ->options(Corporate::all())
                ->creationRules('required_if:type,2')
                ->updateRules('required_if:type,2')
                ->nullable(),

                BelongsToMany::make('Roles', 'roles', Role::class),
                HasMany::make('Qrcode', 'qrcodes', Qrcode::class),

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
            // new NewUsers,
            // new UsersActivity,
            new UsersTypes,
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
        return [
            new DownloadExcel,
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        //return $query->NotSuperAdmin();
    }
    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/users.png" style="height:22px;width:22px;margin=10px" />';
    }
}
