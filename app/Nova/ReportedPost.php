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
use App\Nova\Metrics\ReportPosts;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Metrics\ApprovalPosts;
use OwenMelbz\RadioField\RadioButton;
use App\Nova\Metrics\OpenVsClosePosts;
use App\Nova\Metrics\OpenVsClosedPosts;
use App\Nova\Metrics\ShowVsHiddenPosts;
use Bissolli\NovaPhoneField\PhoneNumber;
use ClassicO\NovaMediaLibrary\MediaField;
use App\Services\Filters\ItemFilters\Lost;
use GeneaLabs\NovaMapMarkerField\MapMarker;
use Laravel\Nova\Http\Requests\NovaRequest;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Techouse\IntlDateTime\IntlDateTime as DateTimeField;
use Carbon\Carbon;

class ReportedPost extends Resource
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

        'owner_releated_to_system',
        'founder_releated_to_system',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    public static $searchRelations = [
        'color' => ['name_en', 'name_ar'],
        'subcategory' => ['name_en', 'name_ar'],
        'brand' => ['name_en', 'name_ar'],
        'model' => ['name_en', 'name_ar'],
        'founder' => ['name', 'email', 'mobile_number'],
        'owner' => ['name', 'email', 'mobile_number'],
        'publisher' => ['name', 'email', 'mobile_number'],
    ];

    public static function availableForNavigation(Request $request)
    {
      return  (Auth()->User()->hasPermissionTo('reported posts')) ? true :false;
    }
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/reported-posts';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {

        $Questions=ID::make()->sortable()->hideFromDetail()->hideFromIndex();
        $PostRequests=ID::make()->sortable()->hideFromDetail()->hideFromIndex();
         if($this->status==1)
        {
        $Questions=HasMany::make('Questions');
         $PostRequests=HasMany::make('Post Requests', 'postrequests', \App\Nova\PostRequest::class);
        }
        return [
           ID::make()->sortable(),
           Text::make('Title')->readonly(),
           Textarea::make('Description')->readonly(),
          // Textarea::make('Reject Reasone','reject_reason'),
        //    RadioButton::make('Status')
        //    ->options([
        //        0 => 'Lost',
        //        1 => 'Found',
        //    ])->default(0), // optional
           RadioButton::make('Approval Status','approval_status')
           ->options([
               0 => 'Pending',
               1 => 'Approval',
               2 => 'Rejected',
           ])->default(0), // optional
            Toggle::make('Appearance Status','appearance_status'),

            NovaBelongsToDepend::make('Subcategory', 'subcategory', \App\Nova\SubCategory::class)
            ->placeholder('Select Sub category')
            ->options(\App\SubCategory::with('brands')->get())
            ->rules('required'),


        NovaBelongsToDepend::make('Brand','brand',\App\Nova\Brand::class)
            ->placeholder('Select Brand')
            ->optionsResolve(function ($subcategory) {
                return $subcategory->brands;
            })
            ->rules('required')
            ->dependsOn('Subcategory'),


        NovaBelongsToDepend::make('Model', 'model', \App\NovaCorporate\Model::class)
            ->placeholder('Optional Placeholder')
            ->optionsResolve(function ($brand) {
                return $brand->models()->get(['id', 'name_en']);
            })
            ->rules('required')
            ->dependsOn('Brand'),
        BelongsTo::make('Color', 'color', \App\Nova\Color::class),


            BelongsTo::make('Publisher', 'publisher', 'App\Nova\User')->readonly()
            ->hideWhenCreating()
            ->hideWhenUpdating(),
            Text::make('Publisher type','publisher_type')
            ->sortable()
            ->hideWhenCreating()
            ->hideWhenUpdating(),


                  //  ->rules('required'),

                  Select::make('Post Type','status')->options([
                    0 => 'Lost',
                    1 => 'Found'
                ])
                ->displayUsingLabels()
                ->rules('required'),


                  NovaDependencyContainer::make([

                    Heading::make('<p class="text-info" style="margin-left:20%">Owner data</p>')->asHtml(),
                    DateTimeField::make('Losted At')->hideFromIndex()
                        //->dateFormat('YYYY-MM-DD')
                        ->maxDate(Carbon::today())
                        ->withTime()
                        ->Rules('required_if:status,0'),

                    RadioButton::make('Owner Releated To System', 'owner_releated_to_system')
                        ->options([
                            2 => 'default',
                            0 => 'No',
                            1 => 'Yes',
                        ])
                        ->stack()
                        ->default(2)
                        ->hideFromIndex(),


                    NovaDependencyContainer::make([
                        NovaBelongsToDepend::make('Person', 'person', 'App\Nova\People')
                            ->placeholder('Select Person')
                            ->options(\App\People::all())
                            ->rules('required_if:owner_releated_to_system,0'),

                    ])->dependsOn('owner_releated_to_system', 0),

                    NovaDependencyContainer::make([
                        NovaBelongsToDepend::make('Owner', 'owner', 'App\Nova\NormalUser')
                            ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                            ->placeholder('Select Owner')
                            ->options(\App\User::NormalUsers()->get())
                            ->rules('required_if:owner_releated_to_system,1'),

                        NovaBelongsToDepend::make('Item', 'item', \App\Nova\Item::class)
                            ->placeholder('Select Item')

                            ->optionsResolve(function ($owner) {
                                return $owner->items()->get();
                            })
                            ->rules('required_if:owner_releated_to_system,1')
                            ->dependsOn('Owner'),

                    ])->dependsOn('owner_releated_to_system', 1),


                ])->dependsOn('status', 0),












                NovaDependencyContainer::make([
                    Heading::make('<p class="text-info" style="margin-left:20%">Founder data</p>')->asHtml(),
                    DateTimeField::make(__('Founded at'), 'founded_at')->hideFromIndex()
                        ->Rules('required_if:status,1')
                        //->dateFormat('YYYY-MM-DD')
                        ->maxDate(Carbon::today())
                        ->withTime(),

                    RadioButton::make('Founder Releated To System', 'founder_releated_to_system')
                        ->options([
                            2 => 'default',
                            0 => 'No',
                            1 => 'yes',

                        ])
                        ->stack()
                        ->hideFromIndex()
                        ->default(2),
                    NovaDependencyContainer::make([

                        NovaBelongsToDepend::make('Person', 'person', 'App\Nova\People')
                            ->placeholder('Select Person')
                            ->options(\App\People::all())
                            ->rules('required_if:founder_releated_to_system,0'),


                    ])->dependsOn('founder_releated_to_system', 0),



                    NovaDependencyContainer::make([

                        NovaBelongsToDepend::make('Founder', 'founder', 'App\Nova\NormalUser')
                            ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                            ->placeholder('Select Owner')
                            ->options(\App\User::NormalUsers()->get()),
                    ])
                        ->dependsOn('founder_releated_to_system', 1)
                        ->rules('required_if:founder_releated_to_system,1'),

                    //HasMany::make('Images', 'images', \App\Nova\PostImage::class),
                    Text::make('Question 1', 'question_1')
                    ->creationRules('required_if:status,1')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                Text::make('Question 2', 'question_2')
                    //->creationRules('required_if:status,1')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                Text::make('Question 3', 'question_3')
                    //->creationRules('required_if:status,1')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                    MediaField::make('Item Image', 'images')->listing(),

                ])->dependsOn('status', 1),






                NovaDependencyContainer::make([

                    Heading::make('<p class="text-info" style="margin-left:20%">Owner data</p>')->asHtml(),
                    DateTimeField::make('Losted At')->hideFromIndex()
                        //->dateFormat('YYYY-MM-DD')
                        ->maxDate(Carbon::today())
                        ->withTime()
                        ->Rules('required_if:status,0'),

                    RadioButton::make('Owner Releated To System', 'owner_releated_to_system')
                        ->options([
                            2 => 'default',
                            0 => 'No',
                            1 => 'Yes',
                        ])
                        ->stack()
                        ->default(2)
                        ->hideFromIndex(),


                    NovaDependencyContainer::make([
                        NovaBelongsToDepend::make('Person', 'person', 'App\Nova\People')
                            ->placeholder('Select Person')
                            ->options(\App\People::all())
                            ->rules('required_if:owner_releated_to_system,0'),

                    ])->dependsOn('owner_releated_to_system', 0),

                    NovaDependencyContainer::make([
                        NovaBelongsToDepend::make('Owner', 'owner', 'App\Nova\NormalUser')
                            ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                            ->placeholder('Select Owner')
                            ->options(\App\User::NormalUsers()->get())
                            ->rules('required_if:owner_releated_to_system,1'),

                        NovaBelongsToDepend::make('Item', 'item', \App\Nova\Item::class)
                            ->placeholder('Select Item')

                            ->optionsResolve(function ($owner) {
                                return $owner->items()->get();
                            })
                            ->rules('required_if:owner_releated_to_system,1')
                            ->dependsOn('Owner'),

                    ])->dependsOn('owner_releated_to_system', 1),


                ])->dependsOn('status', 1)
                ->hideFromIndex()
                ->hideWhenCreating(),






                NovaDependencyContainer::make([
                    Heading::make('<p class="text-info" style="margin-left:20%">Founder data</p>')->asHtml(),
                    DateTimeField::make(__('Founded at'), 'founded_at')->hideFromIndex()
                        ->Rules('required_if:status,1')
                        //->dateFormat('YYYY-MM-DD')
                        ->maxDate(Carbon::today())
                        ->withTime(),

                    RadioButton::make('Founder Releated To System', 'founder_releated_to_system')
                        ->options([
                            2 => 'default',
                            0 => 'No',
                            1 => 'yes',

                        ])
                        ->stack()
                        ->hideFromIndex()
                        ->default(2),
                    NovaDependencyContainer::make([

                        NovaBelongsToDepend::make('Person', 'person', 'App\Nova\People')
                            ->placeholder('Select Person')
                            ->options(\App\People::all())
                            ->rules('required_if:founder_releated_to_system,0'),


                    ])->dependsOn('founder_releated_to_system', 0),



                    NovaDependencyContainer::make([

                        NovaBelongsToDepend::make('Founder', 'founder', 'App\Nova\NormalUser')
                            ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                            ->placeholder('Select Owner')
                            ->options(\App\User::NormalUsers()->get()),
                    ])
                        ->dependsOn('founder_releated_to_system', 1)
                        ->rules('required_if:founder_releated_to_system,1'),

                    //HasMany::make('Images', 'images', \App\Nova\PostImage::class),
                    Text::make('Question 1', 'question_1')
                    ->creationRules('required_if:status,1')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                Text::make('Question 2', 'question_2')
                    //->creationRules('required_if:status,1')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                Text::make('Question 3', 'question_3')
                    //->creationRules('required_if:status,1')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                    MediaField::make('Item Image', 'images')->listing(),

                ])->dependsOn('status', 0)
                ->hideFromIndex()
                ->hideWhenCreating(),


                Heading::make('<p class="text-info" style="margin-left:20%">.</p>')->asHtml(),


                            MapMarker::make("Location")
                            ->defaultZoom(5)
                            ->defaultLatitude(21.4498898)
                            ->defaultLongitude(39.4913431)
                            ->centerCircle(10000, 'DarkCyan', 1, 0.3)->hideFromIndex(),
                           // HasMany::make('Images', 'images', \App\Nova\PostImage::class),
                           HasMany::make('Post Reports', 'reports', \App\Nova\PostReport::class),
                            // HasMany::make('Questions'),
                            // HasMany::make('Post Requests', 'postrequests', \App\Nova\PostRequest::class)
                            $Questions,
                            $PostRequests



        ];
    }


    public static function fill(NovaRequest $request, $model)
    {
        if ($request->input('owner_releated_to_system')) {
            $request->offsetUnset('owner_releated_to_system');
        }

        if ($request->input('founder_releated_to_system')) {
            $request->offsetUnset('founder_releated_to_system');
        }


        return parent::fill($request, $model);
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
            new ReportPosts,
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
        $count=\App\Post::IsReported()->count();
        $span='';
        if($count!=0)
        {
            $span= '<span style="background-color:orange;padding:  1px 2px;border-radius: 50%;">'.$count.'</span>';
        }
        return '<img class="sidebar-icon" src="/images/icons/statistics.png" style="height:22px;width:22px;margin=10px" />'.$span ;

    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->IsReported();
    }


    public static function authorizedToCreate(Request $request)
    {
        return false;
    }
    public  function authorizedToUpdate(Request $request)
    {
        return true;
    }
    public  function authorizedToDelete(Request $request)
    {
        return true;
    }


}
