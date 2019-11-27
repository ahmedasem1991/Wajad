<?php

namespace App\NovaCorporate;
use App\Nova\Resource;
use Naif\Toggle\Toggle;
use App\Nova\Metrics\Posts;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use OwenMelbz\RadioField\RadioButton;
use App\NovaCorporate\Metrics\ShowVsHiddenPosts;
use App\NovaCorporate\Metrics\ApprovalPosts;
use App\NovaCorporate\Metrics\PostsPeriod;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\NovaCorporate\Metrics\OpenVsClosedPosts;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Post extends Resource
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
        'id', 'title', 'description', 'owner_id', 'founder_id', 'publisher_id'
    ];


    public static function availableForNavigation(Request $request)
    {
      return  (Auth()->User()->hasPermissionTo('view posts')) ? true :false;
    }
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
             Toggle::make('Appearance Status','appearance_status')
             ->hideWhenCreating()
             ->hideWhenUpdating(),
           //  BelongsTo::make('Post Type', 'postType', 'App\Nova\PostType'),
             Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Lost.</p>')->asHtml(),
             DateTime::make('Losted At')->hideFromIndex()
             ->Rules('required_if:status,0'),
             Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Found.')->asHtml(),
             DateTime::make('Founded At')->hideFromIndex()
             ->Rules('required_if:status,1'),
             Heading::make('<p class="text-info" style="margin-left:20%"> This Is The Publisher Of The Post.</p>')->asHtml(),
             NovaBelongsToDepend::make('User', 'publisher')
             ->placeholder('Publisher')
             ->options(Auth()->User()->corporate->users),
             NovaBelongsToDepend::make('Item')
             ->placeholder('Item')
             ->optionsResolve(function ($user) {
                 $user_items_with_qrcode = $user->items()
                     ->Has('qrcode')
                     ->get();
                 return $user_items_with_qrcode;
             })->dependsOn('publisher')->nullable(),
             Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Found.</p>')->asHtml(),
             BelongsTo::make('Founder', 'founder', 'App\NovaCorporate\User')
             ->creationRules('required_if:status,1','same:publisher')
             ->updateRules('required_if:status,1')
             ->nullable(),
             Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Lost.</p>')->asHtml(),
             BelongsTo::make('Owner', 'owner', 'App\NovaCorporate\User')
             ->creationRules('required_if:status,0','same:publisher')
             ->updateRules('required_if:status,0')
             ->nullable(),
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
            new PostsPeriod,
            new ShowVsHiddenPosts,
            new OpenVsClosedPosts,
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

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereIn('publisher_id',Auth()->user()->corporate->users->pluck('id'));
    }

    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/post.png" style="height:22px;width:22px;margin=10px" />';
    }
}
