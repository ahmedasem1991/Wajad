<?php

namespace App\Nova;

use App\User;
use NovaErrorField\Errors;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\QrCodes;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Smartappco\QrcodeGenerator\QrcodeGenerator;
use Kristories\Qrcode\Qrcode as QrcodeImgGenerator;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Smartappco\DownloadQrcodeImage\DownloadQrcodeImage;

class Qrcode extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Qrcode';
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
    public static $title = 'qrcode_url';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'unique_reference_number',
        'generate_reference_number',
        'assign_reference_number',
        'corporate_assign_reference_number',
        'type',
        'status',
        'quantity',
        'qrcode_url',
        'image',
        'available_period',
        'start_at',
        'end_at',
        'package_product_pivot_id',
        'user_id',
        'corporate_id',
        'printed',
        'item_id',
        'deleted_at',
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
         $Array = [
            1 => 'In Stock',
            2 => 'Assigned To User',
            3 => 'Assigned To Corporate',
            4 => 'Registered',
            5 => 'Re-Registered',
            6 => 'Expired',
        ];
        return [
            Errors::make(),
            ID::make()->sortable(),
            Text::make('Unique Reference Number', 'unique_reference_number')
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->readonly(),
            BelongsTo::make('Generate Reference Number', 'qrcodegenerate', 'App\Nova\GenerateQrcode')
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            BelongsTo::make('Assign Reference Number', 'assignqrcode', 'App\Nova\AssignQrcode')
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            // Text::make('Status', function () {
            //     return $this->statusTitle($this->status);
            // }),
            Select::make('Status')->options(function(){
               // return \App\Qrcode::STATUS;
               $Array ;
            }
            //     [
            //     'S' => 'Small',
            //     'M' => 'Medium',
            //     'L' => 'Large',
            // ]
            )->displayUsingLabels(),

            Text::make('QR CODE URL', 'qrcode_url', function () {
                return  '<a target="_blank" href=' . $this->qrcode_url . '>URL</a>';
            })->asHtml()
                ->hideWhenUpdating()
                ->hideFromIndex(),

            Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Size is: 5 MB. <b>Images Will Be Resized</b> </p>')
                ->asHtml()->hideFromDetail(),
            Image::make('QRCode Images', 'image')
                ->disk('public')
                ->path('images/qrcodes')
                ->prunable()
                ->deletable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
                HasMany::make('Qrcodelog'),
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
            new QrCodes,
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
        return 'All QR Code';
    }

    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/qrcode.svg" style="height:22px;width:22px;margin=10px" />';
    }
    public   function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
