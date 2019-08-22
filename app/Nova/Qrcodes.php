<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Khalin\Nova\Field\Link;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Kristories\Qrcode\Qrcode;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Smartappco\QrcodeGenerator\QrcodeGenerator;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Qrcodes extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Qrcodes';
    public static $group = 'Item QR Codes';

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

            Qrcode::make('QR Code')
                ->text(route('api.scan-qrcode-api') . '/' . $this->qrcode_url)
                ->logo(env('QRCODE_DEFAULT_IMAGE'))
                ->exceptOnForms(),

            QrcodeGenerator::make('QR CODE URL', 'qrcode_url')
                ->creationRules('required', 'string', 'min:15', 'unique:qrcodes,qrcode_url')
                ->length(15)
                ->showUrl(true)
                ->qrCodeRouteName(route('api.scan-qrcode-api'))
                ->hideWhenUpdating(),

            BelongsTo::make('PackageProductManagement', 'productPackagePivot', \App\Nova\PackageProductManagement::class)->hideWhenUpdating(),

            NovaBelongsToDepend::make('User', 'user')
                ->placeholder('User') // Add this just if you want to customize the placeholder
                ->options(\App\User::all()),

            NovaBelongsToDepend::make('Item')
                ->placeholder('Item')
                ->optionsResolve(function ($user) {
                    $array = array();
                    $items = $user->items()->where('qrcode_id', null)->get(['id', 'title']);
                    foreach ($items as $item) {
                        if (!$item->qrcode)
                            array_push($array, $item);
                    }
                    return $array;
                })->dependsOn('user')->nullable(),

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
}
