<?php

namespace App\Nova;

use App\User;
use URL;
use NovaButton\Button;
use NovaErrorField\Errors;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Smartappco\QrcodeGenerator\QrcodeGenerator;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class QrcodeLog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\QrcodeLog';
    public static $perPageOptions = [50, 100, 150];
    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'QR Code';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'url';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'url',
        'ip',
        'created_at',
        'updated_at',
    ];
    public static $displayInNavigation = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
           // Errors::make(),
            ID::make()->sortable(),
            Button::make('Location')
            ->link(URL::to($this->location),'_blank')
            ->style('success'),
            Text::make('IP', 'ip')
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->readonly(),
                Text::make('Scan time', 'created_at', function () {
                    return   $this->created_at->format('Y-m-d H:i:s');
                })
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->readonly(),
                Text::make('IP', 'ip')
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->readonly(),
                Text::make('Device Type', 'device_type')
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->readonly(),
 
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
           // new QrCodes,
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
        return [];
    }


    public static function label()
    {
        return 'QR Code Log';
    }

    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/qrcode.svg" style="height:22px;width:22px;margin=10px" />';
    }
    public   function authorizedToForceDelete(Request $request)
    {
        return false;
    }
    public   function authorizedToDelete(Request $request)
    {
        return false;
    }
    public   function authorizedToUpdate(Request $request)
    {
        return false;
    }
    public static  function authorizedToCreate(Request $request)
    {
        return false;
    }
}
