<?php

namespace App\NovaCorporate;

use App\User;
use App\Qrcode;
use App\Corporate;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\QrCodes;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\BelongsTo;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Http\Requests\NovaRequest;
use KossShtukert\LaravelNovaSelect2\Select2;
use Smartappco\QrcodeGenerator\QrcodeGenerator;
use Kristories\Qrcode\Qrcode as QrcodeImgGenerator;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Smartappco\DownloadQrcodeImage\DownloadQrcodeImage;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class CorporateAssignQrcode extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\CorporateAssignQrcode';

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
    public static $title = 'corporate_assign_reference_number';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','corporate_assign_reference_number'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $SingleCount=  count(Qrcode::type('Single Assign')
        ->where('corporate_id',Auth()->user()->corporate->id)
        ->where('status','3')
        ->whereNull('user_id')->get());
        $MultiCount=  count(Qrcode::type('Multi Assign')
        ->where('corporate_id',Auth()->user()->corporate->id)
        ->where('status','3')
        ->whereNull('user_id')->get());

        return [
            ID::make()->sortable(),
            Text::make('Reference Number','corporate_assign_reference_number')
            ->hideWhenCreating()
            ->hideWhenUpdating(),


 

             
                Select2::make('User','user_id')
                ->sortable()
                ->options(User::normalusers()->get()->pluck('name', 'id'))
                ->displayUsingLabels()
                ->rules('required')
                ->showAsLink(User::class)
               // ->default(0)
                ->configuration([
                    'placeholder'             => __('Choose an option'),
                    'allowClear'              => true,
                    'minimumResultsForSearch' => 1,
                    'multiple'                => false,
                ]),
              
             
            BelongsTo::make('User')
            ->hideWhenCreating()
            ->hideWhenUpdating(),
            RadioButton::make('Type')
            ->options([
                1 => 'Single Assign',
                2 => 'Multi Assign',
            ]),
          //  ->default(1), // optional
            NovaDependencyContainer::make([
                Heading::make('<p class="text-info" style="margin-left:20%">  Available Single Assign QR Codes Is : <big>'.$SingleCount.' </big> </p>')
                ->asHtml()->hideFromDetail()
               ,
                Number::make('Number Of QR Codes','quantity')
                ->min(1)->max($SingleCount)->step(1)
                ->rules('required','max:'.$SingleCount),
            ])->dependsOn('type', '1'),
            NovaDependencyContainer::make([
                Heading::make('<p class="text-info" style="margin-left:20%">  Available Multi Assign QR Codes Is : <big>'.$MultiCount.' </big> </p>')
                ->asHtml()->hideFromDetail()
               ,
                Number::make('Number Of QR Codes','quantity')
                ->min(1)->max($MultiCount)->step(1)
                ->rules('required','max:'.$MultiCount),
            ])->dependsOn('type', '2'),
            
          
         

 
            Status::make('Status')
            ->loadingWhen(['waiting'])
            ->failedWhen(['finished']),
            HasMany::make('Qrcodes'),

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
    public static function availableForNavigation(Request $request)
    {
      return  (Auth()->User()->hasPermissionTo('view assign qr code')) ? true :false;
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

    
    public static function label() {
        return 'Assign';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
       return $query->whereIn('created_by',Auth()->user()->corporate->users->pluck('id'));
    }
}
