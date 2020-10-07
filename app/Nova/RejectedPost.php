<?php

namespace App\Nova;

use App\User;
use App\People;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
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
use App\Nova\Metrics\ApprovalPosts;
use NovaErrorField\Errors;
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
        return (Auth()->User()->hasPermissionTo('rejected posts')) ? true : false;
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
            Errors::make(),
            ID::make()->sortable(),
            Text::make('Title')->readonly(),
            Textarea::make('Description')->readonly(),
            Textarea::make('Reject Reasone', 'reject_reason'),
            RadioButton::make('Approval Status', 'approval_status')
                ->options([
                    0 => 'Pending',
                    1 => 'Approval',
                    2 => 'Rejected',
                ])
                ->stack()
                ->default(0), // optional
            Toggle::make('Appearance Status', 'appearance_status'),

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
            Text::make('Publisher type', 'publisher_type')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

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
                        ->options(People::all())
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
                        ->options(People::all())
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

                Text::make('Question 1', 'question_1')
                    ->creationRules('required_if:status,1')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                Text::make('Question 2', 'question_2')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                Text::make('Question 3', 'question_3')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),
                MediaField::make('Item Image', 'images')->listing(),
            ])->dependsOn('status', 1),

            NovaDependencyContainer::make([
                Heading::make('<p class="text-info" style="margin-left:20%">Owner data</p>')->asHtml(),
                DateTimeField::make('Losted At')->hideFromIndex()
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
                        ->options(People::all())
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
                        ->options(People::all())
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

                Text::make('Question 1', 'question_1')
                    ->creationRules('required_if:status,1')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                Text::make('Question 2', 'question_2')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                Text::make('Question 3', 'question_3')
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->hideFromIndex(),

                MediaField::make('Item Image', 'images')->listing(),
            ])->dependsOn('status', 0)
                ->hideFromIndex()
                ->hideWhenCreating(),

            Heading::make('<p class="text-info" style="margin-left:20%"></p>')->asHtml(),

            NovaGoogleMaps::make('Location')
                ->setValue($this->latitude, $this->longitude)
                ->setAttributes('latitude', 'longitude')
                ->hideFromIndex()
                ->hideFromDetail(),

            HasMany::make('Post Reports', 'reports', \App\Nova\PostReport::class),
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
        return $query->IsRejected();
    }


    public static function authorizedToCreate(Request $request)
    {
        return false;
    }
}
