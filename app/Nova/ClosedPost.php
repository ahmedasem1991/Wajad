<?php

namespace App\Nova;
use App\User;
use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use App\Nova\Metrics\PostsCount;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use App\Nova\Metrics\PostsPeriod;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use OwenMelbz\RadioField\RadioButton;
use App\Nova\Metrics\OpenVsClosedPosts;
use App\Nova\Metrics\ShowVsHiddenPosts;
use Bissolli\NovaPhoneField\PhoneNumber;
use Laravel\Nova\Http\Requests\NovaRequest;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class ClosedPost extends Resource
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

    public static function availableForNavigation(Request $request)
    {
      return  (Auth()->User()->hasPermissionTo('closed posts')) ? true :false;
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
           Text::make('Title')->readonly(),
           Textarea::make('description')->readonly(),
           RadioButton::make('Status')
           ->options([
               0 => 'Lost',
               1 => 'Found',
           ])->default(0), // optional
            Toggle::make('Appearance Status','appearance_status'),
            Toggle::make('Open Status','open_status'),
            BelongsTo::make('Publisher', 'publisher', 'App\Nova\User')->readonly()
            ->hideWhenCreating()
            ->hideWhenUpdating(),
            Text::make('Publisher type','publisher_type')
            ->sortable()
            ->hideWhenCreating()
            ->hideWhenUpdating()
            ->readonly(),


                  //  ->rules('required'),



                  Heading::make('<p class="text-info" style="margin-left:20%">Owner data if post type is lost</p>')->asHtml(),
                  DateTime::make('Losted At')->hideFromIndex()
                  ->readonly()
                  ->Rules('required_if:status,0'),

                  RadioButton::make('Owner Releated To System','owner_releated_to_system')
                  ->options([
                    2=> 'default',
                      0 => 'No',
                      1 => 'Yes',
                  ])
                  ->default(2)
                  ->hideFromIndex()
                  ->readonly(),

                 // optional
                  NovaDependencyContainer::make([

                    Text::make('Owner Name','owner_name')
                    ->sortable()
                    ->rules( 'max:255','required_if:owner_releated_to_system,0')
                    ->readonly(),

                    Text::make('Owner Email','owner_email')
                    ->sortable()
                    ->rules( 'email', 'max:254','required_if:owner_releated_to_system,0'),

                    PhoneNumber::make('Owner Mobile Number','owner_mobile_number')
                    ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
                    ->onlyCustomFormats()
                    ->rules('required_if:owner_releated_to_system,0')
                    ->readonly()
                    ,
                    Text::make('Owner Address','owner_address')
                    ->sortable()
                    ->rules( 'max:254','required_if:owner_releated_to_system,0')
                    ->readonly(),

                    ])->dependsOn('owner_releated_to_system', 0),

                    NovaDependencyContainer::make([
                          NovaBelongsToDepend::make('Owner', 'owner', 'App\Nova\NormalUser')
                        ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                            ->placeholder('Select Owner')
                            ->options(User::NormalUsers()->get())
                            ->rules('required_if:owner_releated_to_system,1')
                            ->readonly(),

                            NovaBelongsToDepend::make('Item', 'item', \App\Nova\Item::class)
                            ->placeholder('Select Item')

                            ->optionsResolve(function ($owner) {
                                return $owner->items()->lost()->get();
                            })
                            ->rules('required_if:owner_releated_to_system,1')
                            ->readonly()
                           ->dependsOn('Owner'),

                        ])->dependsOn('owner_releated_to_system', 1),


                        Heading::make('<p class="text-info" style="margin-left:20%">Founder data if post type is found</p>')->asHtml(),
                        DateTime::make('Founded At')->hideFromIndex()
                        ->Rules('required_if:status,1')
                        ->readonly(),

                        RadioButton::make('Founder Releated To System','founder_releated_to_system')
                        ->options([
                            2=> 'default',
                            0 => 'No',
                            1 => 'yes',

                            ])
                            ->hideFromIndex()
                           ->default(2)
                           ->readonly()
                           ,
                    NovaDependencyContainer::make([
                        Text::make('Founder Name','founder_name')
                        ->sortable()
                        ->rules( 'max:255','required_if:founder_releated_to_system,0')
                        ->readonly(),


                        Text::make('Founder Email','founder_email')
                        ->sortable()
                        ->rules( 'email', 'max:254','required_if:founder_releated_to_system,0')
                        ->readonly(),

                        PhoneNumber::make('Founder Mobile Number','founder_mobile_number')
                        ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
                        ->onlyCustomFormats()
                        ->rules('required_if:founder_releated_to_system,0')
                        ->readonly(),
                        Text::make('Founder Address','founder_address')
                        ->sortable()
                        ->rules( 'max:254','required_if:founder_releated_to_system,0')
                        ->readonly(),

                        ])->dependsOn('founder_releated_to_system', 0),

                        NovaDependencyContainer::make([

                            NovaBelongsToDepend::make('Founder', 'founder', 'App\Nova\NormalUser')
                            ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                                ->placeholder('Select Owner')
                                ->options(User::NormalUsers()->get()),
                            ])
                            ->dependsOn('founder_releated_to_system', 1)
                            ->rules('required_if:founder_releated_to_system,1')
                            ->readonly()  ,

                            HasMany::make('Images', 'images', \App\Nova\PostImage::class),
                            HasMany::make('Questions'),
                            HasMany::make('Post Requests', 'postrequests', \App\Nova\PostRequest::class)
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
            new OpenVsClosedPosts,
            new ShowVsHiddenPosts,

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
    return  '<img class="sidebar-icon" src="/images/icons/rejected.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->IsClosed()->isApproved();
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }


}
