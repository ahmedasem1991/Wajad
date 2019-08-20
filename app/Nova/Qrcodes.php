<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Khalin\Nova\Field\Link;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Kristories\Qrcode\Qrcode;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
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
    public static $title = 'name';

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
            Text::make('name'),
            Qrcode::make('QR Code')
                ->text($this->text . $this->id)
                ->logo($this->logo)
                ->exceptOnForms(),

            Link::make('Link', 'link')
                ->url(function () {
                    return $this->text . $this->id;
                })->withMeta(["value" => env('API_URL') . '/api/getQr/' . $this->id])->hideWhenCreating()->hideWhenUpdating(),
            Boolean::make('Active'),
            Text::make('logo')->hideFromIndex(),
            Text::make('Text')->withMeta(["value" => env('API_URL') . '/api/getQr/' . $this->id])
                ->hideFromIndex()
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),
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
