<?php

namespace App\NovaCorporate;

use App\Brand;
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
use App\NovaCorporate\Metrics\PostsPeriod;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\NovaCorporate\Metrics\OpenVsClosedPosts;
use App\NovaCorporate\Metrics\ShowVsHiddenPosts;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class HiddenPost extends Resource
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
      return  (Auth()->User()->hasPermissionTo('hidden posts')) ? true :false;
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
           
            
            Toggle::make('Appearance Status','appearance_status'),
            //Toggle::make('Open Status','open_status'),
           //  BelongsTo::make('Post Type', 'postType', 'App\Nova\PostType'),
             //Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Lost.</p>')->asHtml(),
             //DateTime::make('Losted At')->hideFromIndex()
             //->Rules('required_if:status,0'),
            // Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Found.')->asHtml(),
             DateTime::make('Founded At')->hideFromIndex()
             ->Rules('required_if:status,1'),
             
      

             NovaBelongsToDepend::make('Brand','brand','App\NovaCorporate\Brand')
            ->placeholder('Optional Placeholder')  
            ->options(Brand::all())
            ->rules('required'),
          

            NovaBelongsToDepend::make('Model', 'model','App\NovaCorporate\Model') 
            ->placeholder('Optional Placeholder')    
            ->optionsResolve(function ($brand) {
            return $brand->models()->get(['id','name_en']);
            })
            ->rules('required')
            ->dependsOn('Brand'),
            BelongsTo::make('Color','color','App\Nova\Color'),

             //Heading::make('<p class="text-info" style="margin-left:20%"> This Is The Publisher Of The Post.</p>')->asHtml(),
            //  NovaBelongsToDepend::make('User', 'publisher')
            //  ->placeholder('Publisher')
            //  ->options(Auth()->User()->corporate->users),
            //  NovaBelongsToDepend::make('Item')
            //  ->placeholder('Item')
            //  ->optionsResolve(function ($user) {
            //      $user_items_with_qrcode = $user->items()
            //          ->Has('qrcode')
            //          ->get();
            //      return $user_items_with_qrcode;
            //  })->dependsOn('publisher')->nullable(),
             //Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Found.</p>')->asHtml(),
            //  BelongsTo::make('Founder', 'founder', 'App\NovaCorporate\User')
            //  ->creationRules('required_if:status,1','same:publisher')
            //  ->updateRules('required_if:status,1')
            //  ->nullable(),
            

               Heading::make('<p class="text-info" style="margin-left:20%">Founder Data</p>')->asHtml(),
                Text::make('Founder Name','founder_name')
                ->sortable()
                ->rules('required', 'max:255'),

                Text::make('Founder Email','founder_email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),
 
                PhoneNumber::make('Founder Mobile Number','founder_mobile_number')
                ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
                ->onlyCustomFormats(),
                Text::make('Founder Address','founder_address',)
                ->sortable()
                ->rules('required', 'max:254'),
                Heading::make('<p class="text-info" style="margin-left:20%">Owner Data</p>')->asHtml(),
                BelongsTo::make('Owner', 'owner', 'App\NovaCorporate\NormalUser')
                ->readonly(),
               


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
             HasMany::make('Images','images',\App\Nova\PostImage::class),
             HasMany::make('Questions'),
             HasMany::make('Post Requests','postrequests' ,\App\NovaCorporate\PostRequest::class)

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
    return  '<img class="sidebar-icon" src="/images/icons/hidden.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->isApproved()->IsHidden()
        ->where('corporate_id',Auth()->user()->corporate->id);
    }


}
