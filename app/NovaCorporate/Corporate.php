<?php

namespace App\NovaCorporate;

use App\Nova\Resource;
use ClassicO\NovaMediaLibrary\MediaField;
use Illuminate\Http\Request;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaErrorField\Errors;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Corporate extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Corporate::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name_en';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Resources';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'unique_id',
        'name_en',
        'name_ar',
        'details_en',
        'details_ar',
        'address_en',
        'address_ar',
        'location',
        'latitude',
        'longitude',
        'status',
        'image',
        'end_date',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static function availableForNavigation(Request $request)
    {
        return false;
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

            Text::make('Corporate English Name', 'name_en')->rules(
                'required',
                'string',
                'max:255',
                'min:2'
            ),
            Text::make('Corporate Arabic Name', 'name_ar')->rules(
                'required',
                'string',
                'max:255',
                'min:2'
            ),
            NovaBelongsToDepend::make('Country Code', 'country', \App\Nova\Country::class)
                ->placeholder('Select Country')
                ->options(\App\Country::all()),
            Number::make('Mobile Number', 'mobile_number')
                ->creationRules('required', 'unique:corporates,mobile_number')
                ->updateRules('required', 'unique:corporates,mobile_number,{{resourceId}}'),
            Trix::make('Corporate English Details', 'details_en')
                ->rules(
                    'required',
                    'string',
                    'max:255',
                    'min:2'
                ),
            Trix::make('Corporate Arabic Details', 'details_ar')
                ->rules(
                    'required',
                    'string',
                    'max:255',
                    'min:2'
                ),
            Text::make('Corporate English Address', 'address_en')->rules(
                'required',
                'string',
                'max:255',
                'min:2'
            ),
            Text::make('Corporate Arabic Address', 'address_ar')->rules(
                'required',
                'string',
                'max:255',
                'min:2'
            ),
            Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Size is: 5 MB. <b>Images Will Be Resized</b> </p>')
                ->asHtml()->hideFromDetail(),
            MediaField::make('Corporate Image', 'image')->rules('required'),

            NovaGoogleMaps::make('Location')
                ->setValue($this->latitude, $this->longitude)
                ->setAttributes('latitude', 'longitude')
                ->hideFromIndex()
                ->hideFromDetail(),
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

    public static function icon()
    {
        return '<img class="sidebar-icon" src="/images/icons/company.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', Auth()->user()->corporate_id);
    }

    public static function authorizedToViewAny(Request $request)
    {
        return true;
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
