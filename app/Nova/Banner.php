<?php

namespace App\Nova;

use App\Item;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use App\Nova\Metrics\Banners;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use KossShtukert\LaravelNovaSelect2\Select2;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class Banner extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Banner';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Classes';

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
            Text::make('Banner English Title', 'title_en')->creationRules([
                'required', 'min:6'
            ]),
            Text::make('Banner Arabic Title', 'title_ar')->creationRules([
                'required', 'min:6'
            ]),
            Textarea::make('Banner English Body', 'description_en')->creationRules([
                'required', 'min:6'
            ]),
            Textarea::make('Banner Arabic Body', 'description_ar')->creationRules([
                'required', 'min:6'
            ]),
            Image::make('Banner Image', 'image')
                ->creationRules([
                    'required', 'image', 'mimes:jpeg,bmp,png', 'max:5012'
                ])
                ->disk('public')
                ->path('images/banners')
                ->prunable()
                ->deletable(),
                Select::make('Open at', 'open_at')->options([
                    'lost' => 'Lost Item',
                    'found' => 'Found Item',
                    'url' => 'URL',
                    'image_url' => 'Image URL',
                    
               ])->rules('required')
                ->displayUsingLabels(),
               
            NovaDependencyContainer::make([
                Text::make('URL', 'url')->nullable()
                ])->dependsOn('open_at', 'url'),

            NovaDependencyContainer::make([
                Text::make('Image URL', 'image_url')->nullable()
                ])->dependsOn('open_at', 'image_url'),

                NovaDependencyContainer::make([
                    Select2::make('Lost Item','item_id')
                    ->sortable()
                    ->options(Item::lost()->get()->pluck('title', 'id'))
                    ->displayUsingLabels()
                    ->rules('required')
                    ->showAsLink(Item::class)
                 //   ->linkToResource('items')
                  // ->default(0)
                    ->configuration([
                        'placeholder'             => __('Choose an option'),
                        'allowClear'              => true,
                        'minimumResultsForSearch' => 1,
                        'multiple'                => false,
                    ])
                ])->dependsOn('open_at', 'lost'),

                NovaDependencyContainer::make([
                    Select2::make('Found Item','item_id')
                    ->sortable()
                    ->options(Item::found()->get()->pluck('title', 'id'))
                    ->displayUsingLabels()
                    ->rules('required')
                    ->showAsLink()
                  // ->default(0)
                    ->configuration([
                        'placeholder'             => __('Choose an option'),
                        'allowClear'              => true,
                        'minimumResultsForSearch' => 1,
                        'multiple'                => false,
                    ])
                ])->dependsOn('open_at', 'found'),
               

                
 
                 
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
            new Banners(),
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
    public static function icon() 
    {
    return  '<img class="sidebar-icon" src="/images/icons/slider.png" style="height:22px;width:22px;margin=10px" />';
    }
}
