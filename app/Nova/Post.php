<?php

namespace App\Nova;

use App\Item;
use App\User;
use App\People;
use NovaButton\Button;
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
use Illuminate\Support\Facades\URL;
use OwenMelbz\RadioField\RadioButton;
use App\Nova\Metrics\OpenVsClosedPosts;
use App\Nova\Metrics\ShowVsHiddenPosts;
use Bissolli\NovaPhoneField\PhoneNumber;
use ClassicO\NovaMediaLibrary\MediaField;
use App\Services\Filters\ItemFilters\Lost;
use GeneaLabs\NovaMapMarkerField\MapMarker;
use Laravel\Nova\Http\Requests\NovaRequest;
use KossShtukert\LaravelNovaSelect2\Select2;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use EmilianoTisato\NovaBelongsToDepends\NovaBelongsToDepends;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

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

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('view posts')) ? true : false;
    }
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
    public static $searchRelations = [
        'color' => ['name_en'],
        'brand' => ['name_en'],
        'model' => ['name_en'],
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
            Text::make('Title')
                ->rules('required'),
            Textarea::make('description')
                ->rules('required'),

            Toggle::make('Appearance Status', 'appearance_status'),
            Toggle::make('Open Status', 'open_status'),
            DateTime::make('Post Closing Date', 'end_date')->updateRules('required')
                ->hideWhenCreating(),
            RadioButton::make('Approval Status', 'approval_status')
                ->options([
                    0 => 'Pending',
                    1 => 'Approval',
                    2 => 'Rejected',
                ])->default(0), // optional
            RadioButton::make('Status')
                ->options([
                    0 => 'Lost',
                    1 => 'Found',
                ])
                ->default(0)
                ->rules('required'), // optional


                NovaBelongsToDepend::make('Subcategory', 'subcategory', \App\Nova\SubCategory::class)
                ->placeholder('Select Sub category')
                ->options(\App\SubCategory::with('brands')->get()),
               // ->rules('required'),


            NovaBelongsToDepend::make('Brand','brand',\App\Nova\Brand::class)
                ->placeholder('Select Brand')
                ->optionsResolve(function ($subcategory) {
                    return $subcategory->brands;
                })
              //  ->rules('required')
                ->dependsOn('Subcategory'),


            NovaBelongsToDepend::make('Model', 'model', \App\Nova\Model::class)
                ->placeholder('Optional Placeholder')
                ->optionsResolve(function ($brand) {
                    return $brand->models()->get(['id', 'name_en']);
                })
              //  ->rules('required')
                ->dependsOn('Brand'),
            BelongsTo::make('Color', 'color', \App\Nova\Color::class),

            BelongsTo::make('Publisher', 'publisher', 'App\Nova\User')->readonly()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Text::make('Publisher type', 'publisher_type')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Heading::make('<p class="text-info" style="margin-left:20%">Owner data if post type is lost</p>')->asHtml(),
            DateTime::make('Losted At')->hideFromIndex()
                ->Rules('required_if:status,0'),

            RadioButton::make('Owner Releated To System', 'owner_releated_to_system')
                ->options([
                    2 => 'default',
                    0 => 'No',
                    1 => 'Yes',
                ])
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
                    ->options(User::NormalUsers()->get())
                    ->rules('required_if:owner_releated_to_system,1'),

                NovaBelongsToDepend::make('Item', 'item', \App\Nova\Item::class)
                    ->placeholder('Select Item')

                    ->optionsResolve(function ($owner) {
                        return $owner->items()->withFilters(new Lost)->get();
                    })
                    ->rules('required_if:owner_releated_to_system,1')
                    ->dependsOn('Owner'),

            ])->dependsOn('owner_releated_to_system', 1),


            Heading::make('<p class="text-info" style="margin-left:20%">Founder data if post type is found</p>')->asHtml(),
            DateTime::make('Founded At')->hideFromIndex()
                ->Rules('required_if:status,1'),

            RadioButton::make('Founder Releated To System', 'founder_releated_to_system')
                ->options([
                    2 => 'default',
                    0 => 'No',
                    1 => 'yes',

                ])
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
                    ->options(User::NormalUsers()->get()),
            ])
                ->dependsOn('founder_releated_to_system', 1)
                ->rules('required_if:founder_releated_to_system,1'),

            //HasMany::make('Images', 'images', \App\Nova\PostImage::class),
            MediaField::make('Item Image', 'images')->listing(),

            MapMarker::make("Location")
            ->defaultZoom(5)
            ->defaultLatitude(21.4498898)
            ->defaultLongitude(39.4913431)
            ->centerCircle(10000, 'DarkCyan', 1, 0.3),

            HasMany::make('Questions'),
            HasMany::make('Post Requests', 'postrequests', \App\Nova\PostRequest::class),



            Button::make('PDF')
                ->link(URL::to('receipt?p=' . base64_encode($this->id)), '_blank')
                ->style('danger'),





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

    // public static function fill(NovaRequest $request, $model)
    // {
    //     if ($request->input('owner_releated_to_system')) {
    //         $request->offsetUnset('owner_releated_to_system');
    //     }

    //     if ($request->input('founder_releated_to_system')) {
    //         $request->offsetUnset('founder_releated_to_system');
    //     }


    //     return parent::fill($request, $model);
    // }

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
        return  '<img class="sidebar-icon" src="/images/icons/post.png" style="height:22px;width:22px;margin=10px" />';
    }
}
