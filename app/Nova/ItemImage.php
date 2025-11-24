<?php

//
// namespace App\Nova;
//
// use App\Nova\Metrics\ItemImages;
// use Laravel\Nova\Fields\Heading;
// use Laravel\Nova\Fields\ID;
// use Laravel\Nova\Fields\Image;
//
//
//
// use Illuminate\Http\Request;
// use Laravel\Nova\Fields\BelongsTo;
// use Laravel\Nova\Http\Requests\NovaRequest;
// use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
//
// class ItemImage extends Resource
// {
//    /**
//     * The model the resource corresponds to.
//     *
//     * @var string
//     */
//    public static $model = 'App\ItemImage';
//
//    /**
//     * The logical group associated with the resource.
//     *
//     * @var string
//     */
//    public static $group = 'Items';
//    public static $displayInNavigation = false;
//
//    /**
//     * The single value that should be used to represent the resource when being displayed.
//     *
//     * @var string
//     */
//    public static $title = 'id';
//
//    /**
//     * The columns that should be searched.
//     *
//     * @var array
//     */
//    public static $search = [
//        'id',
//        'item_id',
//        'image',
//        'deleted_at',
//        'created_at',
//        'updated_at',
//    ];
//
//    /**
//     * Get the fields displayed by the resource.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    public function fields(Request $request)
//    {
//        return [
//            ID::make()->sortable(),
//            Heading::make('<p class="text-info" style="margin-left:20%">  Allowed Extensions Are: <b>jpeg,bmp,png.</b> Maximum Size is: 5 MB. <b>Images Will Be Resized</b> </p>')
//                ->asHtml()->hideFromDetail(),
//            Image::make('Image', 'image')
//            ->creationRules([
//                'required', 'image', 'mimes:jpeg,bmp,png', 'max:5012'
//            ])
//            ->disk('public')
//            ->path('images/items')
//            ->disableDownload()
//            ->prunable()
//            ->deletable(),
//
//            NovaBelongsToDepend::make('Item', 'item', Item::class)->rules('required')
//            ->placeholder('Item')
//            ->options(\App\Item::all())
//
//        ];
//    }
//
//    /**
//     * Get the cards available for the request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    public function cards(Request $request)
//    {
//        return [
//            new ItemImages()
//        ];
//    }
//
//    /**
//     * Get the filters available for the resource.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    public function filters(Request $request)
//    {
//        return [];
//    }
//
//    /**
//     * Get the lenses available for the resource.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    public function lenses(Request $request)
//    {
//        return [];
//    }
//
//    /**
//     * Get the actions available for the resource.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    public function actions(Request $request)
//    {
//        return [];
//    }
//    public static function icon()
//    {
//    return  '<img class="sidebar-icon" src="/images/icons/qrcode.svg" style="height:22px;width:22px;margin=10px" />';
//    }
// }
