<?php

namespace App\NovaCorporate;

use App\User;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\QrCodes;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use NovaErrorField\Errors;
use OwenMelbz\RadioField\RadioButton;
use Faker\Provider\fr_CH\Text as FakerText;
use Laravel\Nova\Http\Requests\NovaRequest;
use Smartappco\QrcodeGenerator\QrcodeGenerator;
use Kristories\Qrcode\Qrcode as QrcodeImgGenerator;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Smartappco\DownloadQrcodeImage\DownloadQrcodeImage;

class GenerateQrcode extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\GenerateQrcode';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'QR Code';
    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'generate_reference_number';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'generate_reference_number',
        'type',
        'status',
        'quantity',
        'created_by',
        'created_from',
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
           Text::make('Reference Number','generate_reference_number')
           ->hideWhenCreating()
           ->hideWhenUpdating(),
            RadioButton::make('Type')
            ->options([
                1 => 'Single Assign',
                2 => 'Multi Assign',
            ])->default(1), // optional
            Number::make('Quantity Of QR Codes','quantity')
            ->min(1)->max(10000)->step(1)
            ->rules('required'),
            // Status::make('Status')
            // ->loadingWhen(['waiting'])
            // ->failedWhen(['finished']),
            HasMany::make('Qrcodes','qrcodes',\App\Nova\Stock::class),

           // Number::make('Available Period In Days','available_period')->min(1)->max(365)->step(1),



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

    public static function singularLabel() {
        return 'Generate';
    }

    public static function label() {
        return 'Generate';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
       return $query->whereIn('created_by',Auth()->user()->corporate->users->pluck('id'));
    }
}
