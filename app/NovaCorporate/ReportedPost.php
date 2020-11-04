<?php

namespace App\NovaCorporate;

use App\Brand;
use App\People;
use App\Nova\Resource;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
use NovaButton\Button;
use Naif\Toggle\Toggle;
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
use App\NovaCorporate\Metrics\PostsCount;
use ClassicO\NovaMediaLibrary\MediaField;
use App\NovaCorporate\Metrics\PostsPeriod;
use GeneaLabs\NovaMapMarkerField\MapMarker;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\NovaCorporate\Metrics\OpenVsClosedPosts;
use App\NovaCorporate\Metrics\ShowVsHiddenPosts;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Sloveniangooner\SearchableSelect\SearchableSelect;

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
        'id','title','description','owner_id','founder_id','publisher_id'
    ];

    public static function availableForNavigation(Request $request)
    {
        return  (Auth()->User()->hasPermissionTo('reported posts')) ? true :false;
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
            RadioButton::make('Post Type','status')
                ->options([
                    1 => 'Found',
                ])->default(1)
                ->hideFromIndex(),

            Toggle::make('Open Status', 'open_status')
                ->hideWhenCreating(),
            Toggle::make('Appearance Status', 'appearance_status')
                ->hideWhenCreating(),


            BelongsTo::make('Subcategory', 'subcategory', \App\NovaCorporate\SubCategory::class)
                ->rules('required')
                ->readonly(),

            BelongsTo::make('Brand', 'brand', \App\NovaCorporate\Brand::class)
                ->rules('required')
                ->readonly(),

            BelongsTo::make('Model', 'model', \App\NovaCorporate\Model::class)
                ->rules('required')
                ->readonly(),

            BelongsTo::make('Color', 'color', \App\NovaCorporate\Color::class)
                ->readonly(),

            DateTimeField::make('Post Closing Date', 'end_date')
                ->maxDate(Carbon::today())
                ->withTime()
                ->hideFromIndex()
                ->hideWhenCreating()
                ->Rules('required_if:open_status,0')
                ->hideWhenCreating(),

            Heading::make('<p class="text-info" style="margin-left:20%">Founder Data</p>')->asHtml(),
            NovaBelongsToDepend::make('Person', 'founderPerson', 'App\NovaCorporate\People')
                ->placeholder('Select Person')
                ->options(People::where('corporate_id',auth()->user()->corporate->id)->get())
                ->rules('required')
                ->hideFromIndex(),

            DateTimeField::make(__('Founded at'), 'founded_at')->hideFromIndex()
                ->maxDate(Carbon::today())
                ->withTime(),

            Heading::make('<p class="text-info" style="margin-left:20%">Owner Data</p>')->asHtml()
                ->hideWhenCreating(),

            SearchableSelect::make("Owner", "owner_id")->resource(\App\Nova\NormalUser::class)
                ->displayUsingLabels()
                ->nullable()
                ->hideFromIndex()
                ->hideWhenCreating(),
            MediaField::make('Item Image', 'images')->listing(),

            Heading::make('<p class="text-info" style="margin-left:20%"></p>')->asHtml(),

            Button::make('Close')
                ->style('danger')
                ->reload()
                ->event('App\Events\ClosePostEvent'),

            Button::make('Hidden')
                ->style('grey')
                ->reload()
                ->event('App\Events\HiddenPostEvent'),

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

                Button::make('Close')
                ->style('danger')
                ->reload()
                ->event('App\Events\ClosePostEvent'),

            Button::make('Hidden')
                ->style('grey')
                ->reload()
                ->event('App\Events\HiddenPostEvent'),

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
        return  '<img class="sidebar-icon" src="/images/icons/statistics.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->IsReported()
            ->where('corporate_id',Auth()->user()->corporate->id);
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
    public  function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
