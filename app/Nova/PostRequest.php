<?php

namespace App\Nova;

use App\Nova\Resource;
use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use OwenMelbz\RadioField\RadioButton;

use Laravel\Nova\Http\Requests\NovaRequest;
use App\NovaCorporate\Metrics\ApprovalPosts;

use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class PostRequest extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\PostRequest';
    public static $displayInNavigation = false;
    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Posts';

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
        'user_id',
        'post_id',
        'is_request_valid',
        'rejected_at',
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
        session()->put('user_id',$this->user_id);
        return [
           ID::make()->sortable(),
           RadioButton::make('Valid Status','is_request_valid')
           ->options([
               0 => 'Not Valid',
               1 => 'Valid',
           ])->default(0), // optional
           BelongsTo::make('Post', 'post', APost::class)
           ->readonly()
           ,

           HasMany::make('Answers'),
           BelongsTo::make('Claim user','postrequestuser',\App\Nova\NormalUser::class)
           ->readonly()
           ,
           DateTime::make('Rejected At')
           ->hideFromIndex()
           ->exceptOnForms()
           ->nullable(),
           Text::make('Comment'),


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
    return  '<img class="sidebar-icon" src="/images/icons/it.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {


    }


}
