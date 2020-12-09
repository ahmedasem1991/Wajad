<?php

namespace App\Nova;

use App\User;
use App\Qrcode;
use App\Corporate;
use NovaButton\Button;
use NovaErrorField\Errors;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\QrCodes;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use NovaAjaxSelect\AjaxSelect;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Support\Facades\URL;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Http\Requests\NovaRequest;
use KossShtukert\LaravelNovaSelect2\Select2;
use Smartappco\QrcodeGenerator\QrcodeGenerator;
use Kristories\Qrcode\Qrcode as QrcodeImgGenerator;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Smartappco\DownloadQrcodeImage\DownloadQrcodeImage;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class UserAssignQrcode extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\AssignQrcode';

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
    public static $title = 'assign_reference_number';

    public static $displayInNavigation = false;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'assign_reference_number',
        'assign_to',
        'user_id',
        'corporate_id',
        'type',
        'available_period',
        'quantity',
        'created_by',
        'created_from',
        'status',
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
        $SingleCount=  Qrcode::type('Single Assign')->where('status','1')->count();
        $MultiCount=  Qrcode::type('Multi Assign')->where('status','1')->count();

        return [
            Errors::make(),
            ID::make()->sortable(),
            Text::make('Reference Number','assign_reference_number')
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Select::make('Assign To', 'assign_to')->options([
                '1' => 'To User',
            ])->withMeta(['value'=>'1'])
                ->displayUsingLabels()
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),
            Select::make('User','user_id')
                ->sortable()
                ->withMeta(['value' => $request->viaResourceId])
                ->options(User::where('id',$request->viaResourceId)->get()->pluck('name', 'id'))
                ->displayUsingLabels()
                ->rules('required_if:assign_to,1')
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),

            BelongsTo::make('User')
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            RadioButton::make('Type')
                ->options([
                    1 => 'Single Assign',
                    2 => 'Multi Assign',
                ]),
            NovaDependencyContainer::make([
                // Heading::make('<p class="text-info" style="margin-left:20%">  Available Single Assign QR Codes Is : <big>'.$SingleCount.' </big> </p>')
                //  ->asHtml()->hideFromDetail(),
                Number::make('Quantity Of QR Codes','quantity')
                    ->min(1)->max($SingleCount)->step(1)
                    ->rules('required','max:'.$SingleCount),
            ])->dependsOn('type', '1'),
            NovaDependencyContainer::make([
                // Heading::make('<p class="text-info" style="margin-left:20%">  Available Multi Assign QR Codes Is : <big>'.$MultiCount.' </big> </p>')
                // ->asHtml()->hideFromDetail(),
                Number::make('Quantity Of QR Codes','quantity')
                    ->min(1)->max($MultiCount)->step(1)
                    ->rules('required','max:'.$MultiCount),
            ])->dependsOn('type', '2'),

            Number::make('Available Period In Days','available_period')
                ->min(1)->max(365)->step(1)
                ->rules('required'),

            Button::make('PDF')
                ->link(URL::to('assignqrcodepdf?p='.base64_encode($this->id)),'_blank')
                ->style('danger'),
            RadioButton::make('Created From')
                ->options([
                    'web' => 'web',
                ])->default('web')
                ->hideFromIndex()
                ->hideFromDetail(), // optional,

            Text::make('Created From')
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            HasMany::make('QR Codes','qrcodes', \App\Nova\Qrcode::class),

        ];
    }

    public static function fill(NovaRequest $request, $model)
    {
        if ($request->input('search_user')) {
            $request->offsetUnset('search_user');
        }
        return parent::fill($request, $model);
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


    // public static function fill(NovaRequest $request, $model)
    // {

    //     if ($request->has('search_user')) {

    //         $request->offsetUnset('search_user');
    //     }

    //     return parent::fill($request, $model);
    // }

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
    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/qrcode.svg" style="height:22px;width:22px;margin=10px" />';
    }
    public   function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
