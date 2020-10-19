<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaField;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Naif\MapAddress\MapAddress;
use App\Nova\Metrics\Corporates;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsToMany;
use Naif\Toggle\Toggle;
use NovaErrorField\Errors;
use Spatie\NovaTranslatable\Translatable;
use GeneaLabs\NovaMapMarkerField\MapMarker;

class WajadOffice extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\WajadOffice';
    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name_en';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Classes';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $globallySearchable = false;

    public function fields(Request $request)
    {
        return [
            Errors::make(),
            ID::make()->sortable(),
            Text::make('Office English Name', 'name_en')->rules(
                'required',
                'string',
                'max:255',
                'min:6'
            ),
            Text::make('Office Arabic Name', 'name_ar')->rules(
                'required',
                'string',
                'max:255',
                'min:6'
            ),
            Trix::make('Office English Details', 'details_en')
                ->rules(
                    'required',
                    'string',
                    'max:255',
                    'min:6'
                ),
            Trix::make('Office Arabic Details', 'details_ar')
                ->rules(
                    'required',
                    'string',
                    'max:255',
                    'min:6'
                ),
            Text::make('Office English Address', 'address_en')->rules(
                'required',
                'string',
                'max:255',
                'min:6'
            ),
            Text::make('Office Arabic Address', 'address_ar')->rules(
                'required',
                'string',
                'max:255',
                'min:6'
            ),
            Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Size is: 5 MB. <b>Images Will Be Resized</b> </p>')
                ->asHtml()->hideFromDetail(),
            MediaField::make('Office Image', 'image')->creationRules(
                'required',
                'image',
                'mimes:jpeg,bmp,png',
                'max:5012'
            )->updateRules(
                'image',
                'mimes:jpeg,bmp,png',
                'max:5012'
            ),

            Boolean::make('Active','status')
                ->trueValue(1)
                ->falseValue(0)
                ->withMeta(['value' => $this->status ?? true]),
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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
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
        return [];
    }
    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/office.png" style="height:22px;width:22px;margin=10px" />';
    }
}
