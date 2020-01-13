<?php

namespace App\NovaCorporate;

use App\Brand;
use App\People;
use App\Nova\Resource;
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

    public static function availableForNavigation(Request $request)
    {
        return (Auth()->User()->hasPermissionTo('hidden posts')) ? true : false;
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


            Toggle::make('Appearance Status', 'appearance_status'),
            //Toggle::make('Open Status','open_status'),
            //  BelongsTo::make('Post Type', 'postType', 'App\Nova\PostType'),
            //Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Lost.</p>')->asHtml(),
            //DateTime::make('Losted At')->hideFromIndex()
            //->Rules('required_if:status,0'),
            // Heading::make('<p class="text-info" style="margin-left:20%"> This Is Required If The Post Is Found.')->asHtml(),
            DateTime::make('Founded At')->hideFromIndex()
                ->Rules('required_if:status,1'),



          

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
                ->options(People::where('corporate_id', auth()->user()->corporate->id)->get())
                ->rules('required'),

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
           
            MediaField::make('Item Image', 'images')->listing(),
            // HasMany::make('Images', 'images', \App\Nova\PostImage::class),
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
            ->where('corporate_id', Auth()->user()->corporate->id);
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }
}
