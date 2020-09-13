<?php

namespace App\NovaCorporate;

use App\Brand;
use App\People;
use App\Nova\Resource;
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
   // public static $displayInNavigation = false;
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

        return [
            ID::make()->sortable(),
            Text::make('Title'),
            Textarea::make('description'),
            RadioButton::make('Status')
            ->options([
               // 0 => 'Lost',
                1 => 'Found',
            ])->default(1)
            ->hideFromIndex()
            ->hideWhenCreating()
            ->hideWhenUpdating(),
           
            
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

            
            Toggle::make('Appearance Status','appearance_status'),
            //Toggle::make('Open Status','open_status'),
           //  BelongsTo::make('Post Type', 'postType', 'App\Nova\PostType'),
             //Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Lost.</p>')->asHtml(),
             //DateTime::make('Losted At')->hideFromIndex()
             //->Rules('required_if:status,0'),
            // Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Found.')->asHtml(),
             DateTime::make('Founded At')->hideFromIndex()
             ->Rules('required_if:status,1'),
             
       

               Heading::make('<p class="text-info" style="margin-left:20%">Founder Data</p>')->asHtml(),
               
               NovaBelongsToDepend::make('Person', 'person', 'App\NovaCorporate\People')
               ->placeholder('Select Person')
               ->options(People::where('corporate_id',auth()->user()->corporate->id)->get())
               ->rules('required'),
               
                Heading::make('<p class="text-info" style="margin-left:20%">Owner Data</p>')->asHtml(),
               
                SearchableSelect::make("Owner", "owner_id")->resource(\App\Nova\NormalUser::class)
                ->displayUsingLabels()
                ->readonly()
                ->nullable(),
               


            // Password::make('Password')
            //     ->onlyOnForms()
            //     ->creationRules('required', 'string', 'min:8')
            //     ->updateRules('nullable', 'string', 'min:8'),
                
               
            // Button::make('PDF')
            // ->link(URL::to('receipt?p='.base64_encode($this->id)),'_blank')
            // ->style('danger'),
            //  Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Lost.</p>')->asHtml(),
            //  BelongsTo::make('Owner', 'owner', 'App\NovaCorporate\User')
            //  ->creationRules('required_if:status,0','same:publisher')
            //  ->updateRules('required_if:status,0')
            //  ->nullable(),
            MediaField::make('Item Image', 'images')->listing(),
            MapMarker::make("Location")
            ->defaultZoom(5)
            ->defaultLatitude(21.4498898)
            ->defaultLongitude(39.4913431)
            ->centerCircle(10000, 'DarkCyan', 1, 0.3),
             //HasMany::make('Images','images',\App\Nova\PostImage::class),
             HasMany::make('Questions'),
             HasMany::make('Post Requests','postrequests' ,\App\NovaCorporate\PostRequest::class),
             HasMany::make('Post Reports', 'reports', \App\Nova\PostReport::class)

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
            new ShowVsHiddenPosts,
            // new OpenVsClosedPosts,
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
        return false;
    }
    public  function authorizedToDelete(Request $request)
    {
        return false;
    }


}
