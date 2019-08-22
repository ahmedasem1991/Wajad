<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Laravel\Nova\Fields\HasOne;

class Item extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Item';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

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
            Text::make('Title')->creationRules([
                'required',
            ]),
            // Text::make('status'),
            Trix::make('Details'),
            Number::make('Radius'),

            // Qrcode::make('QR Code')
            // ->text('http://laravel.com')
            // ->logo('http://www.smartappco.net/frontend/images/remove/logo.png')
            // ->exceptOnForms(),

            //  ArrayImages::make('Images', 'images')
            //  ->disk('public')
            //  ->path('images/itmes'),



            // BelongsTo::make('User','owner'),
            // BelongsTo::make('QR Code','qrcode','App\Nova\Qrcodes'),


            //HasMany::make('Item Images', 'images', 'App\Nova\Item_Images'),

            NovaBelongsToDepend::make('User', 'owner')
                ->placeholder('User') // Add this just if you want to customize the placeholder
                ->options(\App\User::all()),

            HasOne::make('Qrcodes', 'qrcode', Qrcodes::class)->rules([
                'unique:items,qrcode_id'
            ])->nullable(),


            //    NovaBelongsToDepend::make('QR Code' ,'qrcode','App\Nova\Qrcodes')
            //    ->placeholder('QR Code') // Add this just if you want to customize the placeholder
            //    ->optionsResolve(function ($owner) {
            //        // Reduce the amount of unnecessary data sent
            //      //  return $owner->qrcodes()->where('item_id',null)->get(['id','name']);
            //      $array=array();
            //      $qrcodes= $owner->qrcodes()->where('item_id',null)->get(['id','name']);
            //      foreach( $qrcodes as $qrcode)
            //      {
            //          if(!$qrcode->item)
            //          array_push($array, $qrcode);

            //      } 
            //     return $array;


            //    })
            //    ->dependsOn('owner')->nullable(),
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
