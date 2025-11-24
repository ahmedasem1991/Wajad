<?php

namespace App\NovaCorporate;

use App\Nova\Resource;
use Bissolli\NovaPhoneField\PhoneNumber;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaErrorField\Errors;

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
        'id', 'name', 'email', 'mobile_number', 'address',
    ];

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

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            PhoneNumber::make('Mobile Number', 'mobile_number')
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

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('corporate_id', auth()->user()->corporate->id);
    }

    public static function icon()
    {
        return '<img class="sidebar-icon" src="/images/icons/admin.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('people')) ? true : false;
    }

    public function authorizedToUpdate(Request $request)
    {
        if ($this->id == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function authorizedToDelete(Request $request)
    {
        if ($this->id == 0) {
            return false;
        } else {
            return true;
        }
    }

    // public  function authorizedToForceDelete(Request $request)
    // {
    //     if($this->id ==0)
    //     return false;
    //     else return true;
    // }
    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }

    public function authorizedToRestore(Request $request)
    {
        if ($this->id == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function authorizedToView(Request $request)
    {
        if ($this->id == 0) {
            return false;
        } else {
            return true;
        }
    }
}
