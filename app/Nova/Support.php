<?php

namespace App\Nova;

use App\Nova\Metrics\Supports;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use NovaErrorField\Errors;

class Support extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Support::class;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Settings';

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
        'name',
        'email',
        'phone',
        'message',
        'deleted_at',
        'created_at',
        'updated_at',
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
                ->rules('required', 'max:255'),
            Text::make('Phone')
                ->rules('required', 'max:15'),
            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:255'),
            Textarea::make('Message')
                ->rules('required', 'min:6'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new Supports,
        ];
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
        return '<img class="sidebar-icon" src="/images/icons/contact-us.png" style="height:22px;width:22px;margin=10px" />';
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
