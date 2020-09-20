<?php

namespace App\NovaCorporate;

use App\User;
use App\Brand;
use App\People;
use App\Corporate;
use App\PostImage;
use App\Nova\Resource;
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
        'color' => ['name_en'],
        'brand' => ['name_en'],
        'model' => ['name_en'],
        'founder' => [ 'name', 'email', 'mobile_number'],
        'owner' => ['name', 'email', 'mobile_number'],
    ];

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
            ID::make()->sortable(),
            Text::make('Title')->rules('required'),
            Textarea::make('Description')->rules('required'),
            RadioButton::make('Post Type','status')
                ->options([
                    // 0 => 'Lost',
                    1 => 'Found',
                ])->default(1)
                ->hideFromIndex(),
            // ->hideWhenCreating()
            // ->hideWhenUpdating(),

            Toggle::make('Open Status', 'open_status')
            ->hideWhenCreating()
           // ->hideWhenUpdating()
           ->hideFromIndex(),
       Toggle::make('Appearance Status', 'appearance_status')
            ->hideWhenCreating()
           // ->hideWhenUpdating()
           ->hideFromIndex(),


            NovaBelongsToDepend::make('Subcategory', 'subcategory', \App\NovaCorporate\SubCategory::class)
                ->placeholder('Select Sub category')
                ->options(\App\SubCategory::with('brands')->get()),
            // ->rules('required'),


            NovaBelongsToDepend::make('Brand','brand',\App\NovaCorporate\Brand::class)
                ->placeholder('Select Brand')
                ->optionsResolve(function ($subcategory) {
                    return $subcategory->brands;
                })
                //  ->rules('required')
                ->dependsOn('Subcategory'),


            NovaBelongsToDepend::make('Model', 'model', \App\NovaCorporate\Model::class)
                ->placeholder('Optional Placeholder')
                ->optionsResolve(function ($brand) {
                    return $brand->models()->get(['id', 'name_en']);
                })
                //  ->rules('required')
                ->dependsOn('Brand'),
            BelongsTo::make('Color', 'color', \App\NovaCorporate\Color::class),



                DateTimeField::make('Post Closing Date', 'end_date')
                //->dateFormat('YYYY-MM-DD')
                ->maxDate(Carbon::today())
                ->withTime()
                ->hideFromIndex()
                ->hideWhenCreating()
                ->Rules('required_if:open_status,0')
                ->hideWhenCreating(),
            //->updateRules('required')
              
            //  BelongsTo::make('Post Type', 'postType', 'App\Nova\PostType'),
            //Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Lost.</p>')->asHtml(),
            //DateTime::make('Losted At')->hideFromIndex()
            //->Rules('required_if:status,0'),
            // Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Found.')->asHtml(),
          

               



            Heading::make('<p class="text-info" style="margin-left:20%">Founder Data</p>')->asHtml(),
            NovaBelongsToDepend::make('Person', 'person', 'App\NovaCorporate\People')
                ->placeholder('Select Person')
                ->options(People::where('corporate_id',auth()->user()->corporate->id)->get())
                ->rules('required'),

                DateTimeField::make(__('Founded at'), 'founded_at')->hideFromIndex()
                ->Rules('required_if:status,1')
                //->dateFormat('YYYY-MM-DD')
                ->maxDate(Carbon::today())
                ->withTime(),


            Heading::make('<p class="text-info" style="margin-left:20%">Owner Data</p>')->asHtml()
                // ->hideWhenUpdating(),
                ->hideWhenCreating(),

            // Select2::make('Owner', 'owner_id')

            //     ->options(User::Normalusers()->get()->pluck('name','id'))
            //     //->displayUsingLabels()
            //     // ->rules('required')
            //     ->hideWhenCreating(),

            SearchableSelect::make("Owner", "owner_id")->resource(\App\Nova\NormalUser::class)
            ->displayUsingLabels()
            ->nullable()
            ->hideWhenCreating(),
            MediaField::make('Item Image', 'images')->listing(),

            Heading::make('<p class="text-info" style="margin-left:20%">.</p>')->asHtml()
                // ->hideWhenUpdating(),
              ,

            Button::make('PDF')
                ->link(URL::to('receipt?p=' . base64_encode($this->id)), '_blank')
                ->style('danger'),
           

            MapMarker::make("Location")
                ->defaultZoom(5)
                ->defaultLatitude(21.4498898)
                ->defaultLongitude(39.4913431)
                ->centerCircle(10000, 'DarkCyan', 1, 0.3)
                ->hideFromIndex(),

                Text::make('Question')->creationRules('required')
                ->hideWhenUpdating()
                ->hideFromDetail()
                ->hideFromIndex(),

                HasMany::make('Post Reports', 'reports', \App\NovaCorporate\PostReport::class),
            //HasMany::make('Images', 'images', \App\Nova\PostImage::class),
           // HasMany::make('Questions'),
            //HasMany::make('Post Requests', 'postrequests', \App\NovaCorporate\PostRequest::class),
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
            // new ApprovalPosts
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
        return $query->where('corporate_id', Auth()->user()->corporate->id);
    }

    public static function icon()
    {
        return  '<img class="sidebar-icon" src="/images/icons/post.png" style="height:22px;width:22px;margin=10px" />';
    }
}
