<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Image;
use Kristories\Qrcode\Qrcode;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Boolean;
use Khalin\Nova\Field\Link;
use Illuminate\Support\Str;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Log;
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
        if(!Str::endsWith($this->logo, 'png') || !Str::endsWith($this->logo, 'jpg') || !Str::endsWith($this->logo, 'jpeg'))
        {
            $this->logo='https://cdn4.iconfinder.com/data/icons/logos-3/504/Laravel-512.png';
        }

 
       
       
        return [
            ID::make()->sortable(),
            Text::make('name'),
            NovaBelongsToDepend::make('User','user')
            ->placeholder('User') // Add this just if you want to customize the placeholder
            ->options(\App\User::all()),
          
            NovaBelongsToDepend::make('Item')
            ->placeholder('Item')  
            ->optionsResolve(function ($user) {
            $array=array();
            $items= $user->items()->get(['id','title']);
            foreach( $items as $item)
            {
                if(!$item->qrcode)
                array_push($array, $item);

            } 
           return $array;

            }) ->dependsOn('user')->nullable(),

            
           


            Qrcode::make('QR Code')
            ->text($this->text.$this->id)
            ->logo($this->logo)
            ->exceptOnForms(),
            Link::make('Link', 'link')
            ->url(function () {
            return $this->text.$this->id;
                })
                ->withMeta(["value" => env('API_URL') . '/api/getQr/'.$this->id])
                ->hideWhenCreating()->hideWhenUpdating(),

               
            
               
                
            Boolean::make('Active'),
            Text::make('logo')->hideFromIndex(),
            Text::make('Text')->withMeta(["value" => env('API_URL') . '/api/getQr/'.$this->id])
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
