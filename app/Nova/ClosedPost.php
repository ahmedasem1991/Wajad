<?php

namespace App\Nova;

use App\Nova\Metrics\OpenVsClosedPosts;
use App\Nova\Metrics\ShowVsHiddenPosts;
use App\People;
use Carbon\Carbon;
use ClassicO\NovaMediaLibrary\MediaField;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Illuminate\Http\Request;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Naif\Toggle\Toggle;
use NovaButton\Button;
use NovaErrorField\Errors;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Techouse\IntlDateTime\IntlDateTime as DateTimeField;

class ClosedPost extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Post::class;

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
        'item' => ['title'],
    ];

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('closed posts')) ? true : false;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {

        $Questions = ID::make()->sortable()->hideFromDetail()->hideFromIndex();
        $PostRequests = ID::make()->sortable()->hideFromDetail()->hideFromIndex();
        if ($this->status == 1) {
            $Questions = HasMany::make('Questions');
            $PostRequests = HasMany::make('Post Requests', 'postrequests', \App\Nova\PostRequest::class);
        }

        return [
            Errors::make(),
            ID::make()->sortable(),
            Text::make('Title')->readonly(),
            Textarea::make('description')->readonly(),
            Textarea::make('Internal Note', 'notes'),

            Select::make('Post Type', 'status')->options([
                0 => 'Lost',
                1 => 'Found',
            ])
                ->displayUsingLabels()
                ->readonly(),
            Toggle::make('Appearance Status', 'appearance_status')->default(function ($request) {
                return 1;
            }),
            Toggle::make('Open Status', 'open_status'),
            DateTimeField::make('Post Closing Date', 'end_date')
                ->maxDate(Carbon::today())
                ->withTime()
                ->hideFromIndex()
                ->hideWhenCreating()
                ->Rules('required_if:open_status,0'),

            BelongsTo::make('Subcategory', 'subcategory', \App\Nova\SubCategory::class)
                ->rules('required')
                ->readonly(),

            BelongsTo::make('Brand', 'brand', \App\Nova\Brand::class)
                ->rules('required')
                ->readonly(),

            BelongsTo::make('Model', 'model', \App\Nova\Model::class)
                ->rules('required')
                ->readonly(),
            BelongsTo::make('Color', 'color', \App\Nova\Color::class)
                ->readonly(),
            BelongsTo::make('Publisher', 'publisher', \App\Nova\User::class)->readonly()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Text::make('Publisher type', 'publisher_type')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating()->hideFromIndex()
                ->readonly(),
            Heading::make('<p class="text-info" style="margin-left:20%">Owner data</p>')->asHtml(),
            DateTime::make('Losted At')->hideFromIndex()
                ->readonly()
                ->Rules('required_if:status,0'),

            Select::make('Owner Releated To System', 'owner_releated_to_system')->options([
                2 => 'default',
                0 => 'No',
                1 => 'Yes',
            ])
                ->displayUsingLabels()
                ->hideFromIndex()
                ->readonly(),

            NovaDependencyContainer::make([
                NovaBelongsToDepend::make('Person', 'ownerPerson', \App\Nova\People::class)
                    ->placeholder('Select Person')
                    ->options(People::all())
                    ->rules('required_if:owner_releated_to_system,0')
                    ->readonly(),

            ])->dependsOn('owner_releated_to_system', 0),

            BelongsTo::make('Owner', 'owner', \App\Nova\NormalUser::class)
                ->rules('required_if:owner_releated_to_system,1')
                ->readonly(),

            BelongsTo::make('Item', 'item', \App\Nova\Item::class)
                ->readonly(),

            Heading::make('<p class="text-info" style="margin-left:20%">Founder data</p>')->asHtml(),
            DateTime::make('Founded At')->hideFromIndex()
                ->Rules('required_if:status,1')
                ->readonly(),

            Select::make('Founder Releated To System', 'founder_releated_to_system')->options([
                2 => 'default',
                0 => 'No',
                1 => 'Yes',
            ])
                ->displayUsingLabels()
                ->hideFromIndex()
                ->readonly(),

            NovaDependencyContainer::make([
                NovaBelongsToDepend::make('Person', 'founderPerson', \App\Nova\People::class)
                    ->placeholder('Select Person')
                    ->options(People::all())
                    ->rules('required_if:founder_releated_to_system,0'),

            ])->dependsOn('founder_releated_to_system', 0),

            BelongsTo::make('Founder', 'founder', \App\Nova\NormalUser::class)
                ->readonly(),
            MediaField::make('Item Image', 'images')->listing(),

            Heading::make('<p class="text-info" style="margin-left:20%"></p>')->asHtml(),

            Heading::make('<p class="text-info" style="margin-left:20%"></p>')->asHtml(),

            Button::make('Open')
                ->style('success')
                ->reload()
                ->event(\App\Events\OpenPostEvent::class),

            NovaGoogleMaps::make('Location')
                ->setValue($this->latitude, $this->longitude)
                ->setAttributes('latitude', 'longitude')
                ->hideFromIndex()
                ->hideFromDetail(),

            HasMany::make('Post Reports', 'reports', \App\Nova\PostReport::class),
            $Questions,
            $PostRequests,
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
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new OpenVsClosedPosts,
            new ShowVsHiddenPosts,

        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function icon()
    {
        return '<img class="sidebar-icon" src="/images/icons/rejected.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->IsClosed()->isApproved();
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
