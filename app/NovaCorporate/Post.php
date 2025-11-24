<?php

namespace App\NovaCorporate;

use App\NovaCorporate\Metrics\LostVsFoundPosts;
use App\User;
use App\Brand;
use App\People;
use App\Corporate;
use App\PostImage;
use App\Nova\Resource;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
use NovaButton\Button;
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
use Illuminate\Support\Facades\URL;
use NovaErrorField\Errors;
use OwenMelbz\RadioField\RadioButton;
use Bissolli\NovaPhoneField\PhoneNumber;
use ClassicO\NovaMediaLibrary\MediaField;
use App\NovaCorporate\Metrics\PostsPeriod;
use GeneaLabs\NovaMapMarkerField\MapMarker;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\NovaCorporate\Metrics\ApprovalPosts;
use KossShtukert\LaravelNovaSelect2\Select2;
use App\NovaCorporate\Metrics\OpenVsClosedPosts;
use App\NovaCorporate\Metrics\ShowVsHiddenPosts;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Sloveniangooner\SearchableSelect\SearchableSelect;
use Techouse\IntlDateTime\IntlDateTime as DateTimeField;
use Carbon\Carbon;


class Post extends Resource
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
        'color' => ['name_en'],
        'brand' => ['name_en'],
        'model' => ['name_en'],
        'founder' => [ 'name', 'email', 'mobile_number'],
        'owner' => ['name', 'email', 'mobile_number'],
    ];
/////
    //Can not find the Field "model" in the Model "App\NovaCorporate\ClosedPost"
    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('view posts')) ? true : false;
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
            $PostRequests=HasMany::make('Post Requests', 'postrequests', \App\NovaCorporate\PostRequest::class);
        }

        return [
            Errors::make(),
            ID::make()->sortable(),
            Text::make('Title')->rules('required'),
            Textarea::make('Description')->rules('required'),
            Textarea::make('Internal Note','notes'),
            RadioButton::make('Post Type','status')
                ->options([
                    1 => 'Found',
                ])->default(1)
                ->hideFromIndex(),

            Toggle::make('Open Status', 'open_status')
                ->hideWhenCreating(),

            Toggle::make('Appearance Status', 'appearance_status')->default(function ($request){return 1;}),
            NovaBelongsToDepend::make('Subcategory', 'subcategory', \App\Nova\SubCategory::class)
                ->placeholder('Select Sub category')
                ->options(\App\SubCategory::with('brands')->get())
                ->hideFromIndex()
                ->hideWhenUpdating(),

            NovaBelongsToDepend::make('Brand', 'brand', \App\Nova\Brand::class)
                ->placeholder('Select Brand')
                ->optionsResolve(function ($subcategory) {
                    return $subcategory->brands;
                })
                ->dependsOn('Subcategory')
                ->hideWhenUpdating()
                ->hideFromIndex(),

            NovaBelongsToDepend::make('Model', 'model', \App\Nova\Model::class)
                ->placeholder('Optional Placeholder')
                ->optionsResolve(function ($brand) {
                    return $brand->models()->get(['id', 'name_en']);
                })
                ->dependsOn('Brand')
                ->hideWhenUpdating()
                ->hideFromIndex(),

            BelongsTo::make('Subcategory', 'subcategory', \App\NovaCorporate\SubCategory::class)
                ->rules('required')
                ->hideWhenCreating()
                ->hideFromDetail()
                ->hideFromIndex()
                ->readonly(),

            BelongsTo::make('Brand', 'brand', \App\NovaCorporate\Brand::class)
                ->hideWhenCreating()
                ->hideFromDetail()
                ->hideFromIndex()
                ->rules('required')
                ->readonly(),

            BelongsTo::make('Model', 'model', \App\NovaCorporate\Model::class)
                ->rules('required')
                ->hideWhenCreating()
                ->hideFromDetail()
                ->hideFromIndex()
                ->readonly(),

            BelongsTo::make('Color', 'color', \App\NovaCorporate\Color::class) ->hideWhenCreating()
                ->hideFromDetail()
                ->hideFromIndex()
                ->readonly(),

            BelongsTo::make('Color', 'color', \App\NovaCorporate\Color::class) ->hideWhenUpdating()
                ->rules('required'),

            DateTimeField::make('Post Closing Date', 'end_date')
                ->maxDate(Carbon::today())
                ->withTime()
                ->hideFromIndex()
                ->hideWhenCreating()
                ->Rules('required_if:open_status,0')
                ->hideWhenCreating(),

            Heading::make('<p class="text-info" style="margin-left:20%">Founder Data</p>')->asHtml(),
            // NovaBelongsToDepend::make('Person', 'person', 'App\NovaCorporate\People')
            //     ->placeholder('Select Person')
            //     ->options(People::where('corporate_id',auth()->user()->corporate->id)->get())
            //     ->rules('required'),

            Select2::make('Person', 'founder_person_id')
            ->showAsLink(People::class)
            ->options(People::where('corporate_id',auth()->user()->corporate->id)->withTrashed()->orderBy('id','asc')->orWhere('id',0)->get()->pluck('name', 'id'))
            ->rules('required'),


        NovaDependencyContainer::make([


            Text::make('Name','founder_name')
            ->sortable()
            ->rules('required', 'max:255'),

        Text::make('Email','founder_email')
            ->sortable()
            ->rules('required', 'email', 'max:254'),

        PhoneNumber::make('Mobile Number','founder_mobile_number')
            ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
            ->onlyCustomFormats(),

        Text::make('Address','founder_address')
            ->sortable()
            ->rules('required', 'max:255'),



        ])->dependsOn('founder_person_id', 0),



            DateTimeField::make(__('Founded at'), 'founded_at')->hideFromIndex()
                ->Rules('required_if:status,1')
                ->maxDate(Carbon::today())
                ->withTime(),

            Heading::make('<p class="text-info" style="margin-left:20%">Owner Data</p>')->asHtml()
                ->hideWhenCreating(),

            SearchableSelect::make("Owner", "owner_id")->resource(\App\Nova\NormalUser::class)
                ->displayUsingLabels()
                ->nullable()
                ->hideWhenCreating(),
            MediaField::make('Item Image', 'images')->listing(),

            Heading::make('<p class="text-info" style="margin-left:20%"></p>')->asHtml(),

            Button::make('Close')
                ->style('danger')
                ->reload()
                ->event(\App\Events\ClosePostEvent::class),

            Button::make('Hidden')
                ->style('grey')
                ->reload()
                ->event(\App\Events\HiddenPostEvent::class),

            Button::make('EN PDF')
                ->link(URL::to('receipt?p=' . base64_encode($this->id)), '_blank')
                ->style('info'),

            Button::make('AR PDF')
                ->link(URL::to('ar_receipt?p=' . base64_encode($this->id)), '_blank')
                ->style('info'),

            NovaGoogleMaps::make('Location')
                ->setValue($this->latitude, $this->longitude)
                ->setAttributes('latitude', 'longitude')
                ->hideFromIndex()
                ->hideFromDetail(),

            Text::make('Question 1', 'question_1')
                ->creationRules('required')
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


            HasMany::make('Post Reports', 'reports', \App\NovaCorporate\PostReport::class),
            $Questions,
            $PostRequests
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
            new LostVsFoundPosts
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
        //return $query->whereIn('publisher_id',Auth()->user()->corporate->users->pluck('id'));
        return $query->where('corporate_id', Auth()->user()->corporate->id)
            ->IsOpen()->isApproved()->IsShow();
    }

    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/post.png" style="height:22px;width:22px;margin=10px" />';
    }
    public  function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
