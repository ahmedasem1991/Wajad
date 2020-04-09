<?php

namespace App\NovaCorporate;

use App\Nova\Resource;
use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use App\Nova\Metrics\PostsCount;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use App\Nova\Metrics\PostsPeriod;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\NovaCorporate\Metrics\ApprovalPosts;
use App\NovaCorporate\Metrics\OpenVsClosePosts;
use App\NovaCorporate\Metrics\OpenVsClosedPosts;
use App\NovaCorporate\Metrics\ShowVsHiddenPosts;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class RejectedPost extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Post';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Posts';
    public static $displayInNavigation = false;
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
        'title',
        'description',
        'item_id',
        'status',
        'appearance_status',
        'open_status',
        'approval_status',
        'reports_number',
        'reward',
        'owner_id',
        'founder_id',
        'publisher_id',
        'publisher_type',
        'corporate_id',
        'losted_at',
        'founded_at',
        'latitude',
        'longitude',
        'sub_category_id',
        'model_id',
        'color_id',
        'brand_id',
        'city_id',
        'founder_name',
        'founder_email',
        'founder_mobile_number',
        'founder_address',
        'owner_name',
        'owner_email',
        'owner_mobile_number',
        'owner_address',
        'owner_releated_to_system',
        'founder_releated_to_system',
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
           ID::make()->sortable(),
           Text::make('Title'),
           Textarea::make('description'),
           RadioButton::make('Status')
           ->options([
               0 => 'Lost',
               1 => 'Found',
           ])->default(0), // optional
           RadioButton::make('Approval Status','approval_status')
           ->options([
               0 => 'Pending',
               1 => 'Approval',
               2 => 'Rejected',
           ])->default(0), // optional
            Toggle::make('Appearance Status','appearance_status'),
            //Toggle::make('Open Status','open_status'),

           // BelongsTo::make('Post Type', 'postType', 'App\Nova\PostType'),
            DateTime::make('Losted At')->hideFromIndex(),
            DateTime::make('Founded At')->hideFromIndex(),
        //     NovaBelongsToDepend::make('Publisher', 'publisher', 'App\Nova\User')
        //     ->placeholder('Publisher') // Add this just if you want to customize the placeholder
        //     ->options(\App\User::all())
        //      ->withMeta(['extraAttributes' => [
        //         'readonly' => true,
        //         'disabled'=> true
        //   ]])->setAttribute( 'disabled', true),
            BelongsTo::make('Publisher', 'publisher', 'App\Nova\User')->readonly(),
            BelongsTo::make('Founder', 'founder', 'App\Nova\User')->readonly(),
            BelongsTo::make('Owner', 'owner', 'App\Nova\User')->readonly(),
            BelongsTo::make('Item')->readonly(),
            // NovaBelongsToDepend::make('Item')
            // ->placeholder('Item')
            // ->optionsResolve(function ($user) {
            //     $user_items = [];
            //     $user_items_with_qrcode = $user->items()
            //         ->Has('qrcode')
            //         ->get();
            //     foreach ($user_items_with_qrcode as $user_item_with_qrcode) {
            //         array_push($user_items, $user_item_with_qrcode);
            //     }
            //     return $user_items;
            // })->dependsOn('publisher')->nullable()->readonly(),
            HasMany::make('Images','images',\App\Nova\PostImage::class)

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
            // new PostsPeriod,
            // new ShowVsHiddenPosts,
            // new OpenVsClosedPosts,
            new ApprovalPosts
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
    return  '<img class="sidebar-icon" src="/images/icons/close.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->IsRejected()
        ->where('corporate_id',Auth()->user()->corporate->id);
       // ->whereIn('publisher_id',Auth()->user()->corporate->users->pluck('id'));
    }


}
