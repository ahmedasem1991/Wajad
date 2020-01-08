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
use App\NovaCorporate\Metrics\PostsPeriod;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\NovaCorporate\Metrics\ApprovalPosts;
use KossShtukert\LaravelNovaSelect2\Select2;
use App\NovaCorporate\Metrics\OpenVsClosedPosts;
use App\NovaCorporate\Metrics\ShowVsHiddenPosts;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
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
        'id', 'title', 'description', 'owner_id', 'founder_id', 'publisher_id',
    ];
    public static $searchRelations = [
        'color' => ['name_en'],
        'brand' => ['name_en'],
        'model' => ['name_en'],
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



        return [
            ID::make()->sortable(),
            Text::make('Title')->rules('required'),
            Textarea::make('Description')->rules('required'),
            RadioButton::make('Status')
                ->options([
                    // 0 => 'Lost',
                    1 => 'Found',
                ])->default(1)
                ->hideFromIndex(),
                // ->hideWhenCreating()
                // ->hideWhenUpdating(),

            //     NovaBelongsToDepend::make('Brand', 'brand', \App\NovaCorporate\Brand::class)
            //     ->placeholder('Optional Placeholder')
            //     ->options(Brand::all())
            //     ->rules('required'),


            // NovaBelongsToDepend::make('Model', 'model', \App\NovaCorporate\Model::class)
            //     ->placeholder('Optional Placeholder')
            //     ->optionsResolve(function ($brand) {
            //         return $brand->models()->get(['id', 'name_en']);
            //     })
            //     ->rules('required')
            //     ->dependsOn('Brand'),
            // BelongsTo::make('Color', 'color', \App\Nova\Color::class),

            Toggle::make('Open Status', 'open_status')
            // ->hideWhenCreating()
            // ->hideWhenUpdating()
            ->hideFromIndex(),
            Toggle::make('Appearance Status', 'appearance_status')
                // ->hideWhenCreating()
                // ->hideWhenUpdating()
                ->hideFromIndex(),
                DateTime::make('Post Closing Date','end_date')->updateRules('required')
            ->hideWhenCreating(),
            //  BelongsTo::make('Post Type', 'postType', 'App\Nova\PostType'),
            //Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Lost.</p>')->asHtml(),
            //DateTime::make('Losted At')->hideFromIndex()
            //->Rules('required_if:status,0'),
            // Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Found.')->asHtml(),
            DateTime::make('Founded At')->hideFromIndex()
                ->rules('required_if:status,1'),



           
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
            NovaBelongsToDepend::make('Person', 'person', 'App\NovaCorporate\People')
            ->placeholder('Select Person')
            ->options(People::where('corporate_id',auth()->user()->corporate->id)->get())
            ->rules('required'),

            // Text::make('Founder Name', 'founder_name')
            //     ->sortable()
            //     ->rules('required', 'max:255'),

            // Text::make('Founder Email', 'founder_email')
            //     ->sortable()
            //     ->rules('required', 'email', 'max:254'),

            // PhoneNumber::make('Founder Mobile Number', 'founder_mobile_number')
            //     ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
            //     ->onlyCustomFormats(),
            // Text::make('Founder Address', 'founder_address')
            //     ->sortable()
            //     ->rules('required', 'max:254'),
            Heading::make('<p class="text-info" style="margin-left:20%">Owner Data</p>')->asHtml()
                // ->hideWhenUpdating(),
                ->hideWhenCreating(),
            // BelongsTo::make('Owner', 'owner', 'App\NovaCorporate\NormalUser')
            //   //  ->readonly()
            //     //->hideWhenUpdating(),
            //      ->hideWhenCreating(),

                 NovaBelongsToDepend::make('Owner', 'owner', 'App\NovaCorporate\NormalUser')
               ->placeholder('Select Person')
               ->options(User::Normalusers()->get())
              // ->rules('required')
               ->hideWhenCreating(),



             

            Button::make('PDF')
                ->link(URL::to('receipt?p=' . base64_encode($this->id)), '_blank')
                ->style('danger'),
            
            HasMany::make('Images', 'images', \App\Nova\PostImage::class),
            HasMany::make('Questions'),
            HasMany::make('Post Requests', 'postrequests', \App\NovaCorporate\PostRequest::class)

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
