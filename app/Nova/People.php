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

class People extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\People';

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
        'id', 'name', 'email','mobile_number','address'
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

           

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            PhoneNumber::make('Mobile Number','mobile_number')
                ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
                ->onlyCustomFormats(),

            Text::make('Address')
                ->sortable()
                ->rules('required', 'max:255'),
               
  

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
           // new UsersTypes,
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
           // new DownloadExcel,
        ];
    }

 
    
    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    // public static function indexQuery(NovaRequest $request, $query)
    // {
    //     return $query->SuperAdmin();
    // }
    public static function icon() 
    {
    return  '<img class="sidebar-icon" src="/images/icons/admin.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function availableForNavigation(Request $request)
    {
      return  (Auth()->User()->hasPermissionTo('people')) ? true :false;
    }
}
