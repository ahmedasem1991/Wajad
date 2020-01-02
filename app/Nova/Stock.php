<?php

namespace App\Nova;

use App\User;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\QrCodes;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Actions\DownloadQRCode;
use Laravel\Nova\Http\Requests\NovaRequest;
use Smartappco\QrcodeGenerator\QrcodeGenerator;
use Kristories\Qrcode\Qrcode as QrcodeImgGenerator;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Smartappco\DownloadQrcodeImage\DownloadQrcodeImage;

class Stock extends Resource
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
        'id', 'unique_reference_number'
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
            Text::make('Unique Reference Number', 'unique_reference_number')
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            BelongsTo::make('Generate Reference Number', 'qrcodegenerate', 'App\Nova\GenerateQrcode')
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            BelongsTo::make('Assign Reference Number', 'assignqrcode', 'App\Nova\AssignQrcode')
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Text::make('Status', function () {
                return $this->statusTitle($this->status);
            }),
            // QrcodeGenerator::make('QR CODE URL', 'qrcode_url')
            //     ->creationRules('required', 'string', 'min:15', 'unique:qrcodes,qrcode_url')
            //     ->length(15)
            //     ->showUrl(true)
            //     ->qrCodeRouteName(route('api.scan-qrcode-api'))
            //     ->hideWhenUpdating()
            //     ->hideFromIndex(),
            Text::make('QR CODE URL', 'qrcode_url', function () {
               
                return  '<a target="_blank" href='.$this->qrcode_url.'>URL</a>';
             })->asHtml()
            ->hideWhenUpdating()
            ->hideFromIndex(),
         
            Image::make('QRCode Images', 'image')
                ->disk('public')
                ->path('images/qrcodes')
                ->prunable()
                ->deletable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            // QrcodeImgGenerator::make('Qrcode image')->text($this->qrcode_url)->hideWhenCreating()->hideWhenUpdating(),

            // DownloadQrcodeImage::make('Download Qrcode')->onlyOnDetail()->withMeta(['qrcodeUrl' => $this->qrcode_url]),

            // NovaBelongsToDepend::make('User')->placeholder('User')->options(User::all()),

            // NovaBelongsToDepend::make('Item')
            //     ->placeholder('Item')
            //     ->optionsResolve(function ($user) {
            //         return $user->items()
            //             ->whereDoesntHave('qrcode')
            //             ->get();
            //     })->dependsOn('user')->nullable(),

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
        return [
            (new DownloadQRCode)->canRun(function (NovaRequest $request) {
                return true;
            }),
            // ->confirmText('Are you sure you want to activate this user?')
            // ->confirmButtonText('Activate')
            // ->cancelButtonText("Don't activate"),
        ];
    }


    public static function label()
    {
        return 'Stock';
    }
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereNull('assign_reference_number');
    }
    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/qrcode.svg" style="height:22px;width:22px;margin=10px" />';
    }
}
