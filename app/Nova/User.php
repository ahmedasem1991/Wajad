<?php

namespace App\Nova;

use App\Corporate;
use Naif\Toggle\Toggle;
use NovaErrorField\Errors;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use App\Nova\Metrics\NewUsers;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Number;
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
use KossShtukert\LaravelNovaSelect2\Select2;
use Tintnaingwin\EmailChecker\Rules\EmailExist;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Manmohanjit\BelongsToDependency\BelongsToDependency;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

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

            Image::make('Profile Image', 'image')
                ->thumbnail(function () {
                    return $this->getAvatar();
                })
                ->preview(function (){
                    return $this->getAvatar();
                })
                ->disk('public')
                ->path('images/profile')
                ->prunable()
                ->deletable()
                ->rules('dimensions:max_width=1000,max_height=1000'),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->creationRules('required','email:rfc,dns','unique:users,email,NULL,id,type,1,deleted_at,NULL')
                ->updateRules('required','email:rfc,dns','unique:users,email,{{resourceId}},id,type,1,deleted_at,NULL'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            NovaBelongsToDepend::make('Country Code', 'country', \App\Nova\Country::class)
                ->placeholder('Select Country')
                ->options(\App\Country::all()),
            Number::make('Mobile Number', 'mobile_number')
                ->creationRules('required','unique:users,mobile_number,NULL,id,type,1,deleted_at,NULL')
                ->updateRules('required','unique:users,mobile_number,{{resourceId}},id,type,1,deleted_at,NULL'),
            HasMany::make('Items'),
            Boolean::make('Active','status')
                ->trueValue(1)
                ->falseValue(0)
                ->withMeta(['value' => $this->status ?? true]),

            HasMany::make('Activity', 'activities')
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            HasMany::make('Subscription')
                ->hideWhenUpdating(),
            Select2::make('Type', 'type')->options([
                '1' => 'Normal User',
            ])->default('1')
                ->rules('required')
                ->displayUsingLabels(),

            BelongsToMany::make('Roles', 'roles', Role::class),
            HasMany::make('QR Code', 'qrcodes', Qrcode::class),
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
        return $query->NormalUsers();
    }
    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/users.png" style="height:22px;width:22px;margin=10px" />';
    }

    public function getAvatar() :string
    {
        if (substr($this->image, 0, 4) === "http") {
            return $this->image;
        }
        else{
            if (file_exists($this->image) === false) {
                return '/images/not2_bg_image.jpg';
            }
            else{
                return env('APP_URL') . "/" . $this->image;
            }

        }

    }
    public  function authorizedToForceDelete(Request $request)
    {
        return false;
    }

    public  function authorizedToRestore(Request $request)
    {
        return false;
    }
}
