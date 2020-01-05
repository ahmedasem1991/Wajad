<?php

namespace App\Nova;

use App\Item;
use App\User;
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
        'id', 'title', 'description', 'owner_id', 'founder_id', 'publisher_id',
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
            DateTime::make('Post Closing Date','end_date')->updateRules('required')
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



            BelongsTo::make('Publisher', 'publisher', 'App\Nova\User')->readonly()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Text::make('Publisher type', 'publisher_type')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),


            //  ->rules('required'),



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

            // optional
            NovaDependencyContainer::make([

                Text::make('Owner Name', 'owner_name')
                    ->sortable()
                    ->rules('max:255', 'required_if:owner_releated_to_system,0'),

                Text::make('Owner Email', 'owner_email')
                    ->sortable()
                    ->rules('email', 'max:254', 'required_if:owner_releated_to_system,0'),

                PhoneNumber::make('Owner Mobile Number', 'owner_mobile_number')
                    ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
                    ->onlyCustomFormats()
                    ->rules('required_if:owner_releated_to_system,0'),
                Text::make('Owner Address', 'owner_address')
                    ->sortable()
                    ->rules('max:254', 'required_if:owner_releated_to_system,0'),

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
                        return $owner->items()->lost()->get();
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
                Text::make('Founder Name', 'founder_name')
                    ->sortable()
                    ->rules('max:255', 'required_if:founder_releated_to_system,0'),


                Text::make('Founder Email', 'founder_email')
                    ->sortable()
                    ->rules('email', 'max:254', 'required_if:founder_releated_to_system,0'),

                PhoneNumber::make('Founder Mobile Number', 'founder_mobile_number')
                    ->withCustomFormats('+20 ## ########', '+996 ## ### ####')
                    ->onlyCustomFormats()
                    ->rules('required_if:founder_releated_to_system,0'),
                Text::make('Founder Address', 'founder_address')
                    ->sortable()
                    ->rules('max:254', 'required_if:founder_releated_to_system,0'),

            ])->dependsOn('founder_releated_to_system', 0),



            NovaDependencyContainer::make([

                NovaBelongsToDepend::make('Founder', 'founder', 'App\Nova\NormalUser')
                    ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
                    ->placeholder('Select Owner')
                    ->options(User::NormalUsers()->get()),
            ])
                ->dependsOn('founder_releated_to_system', 1)
                ->rules('required_if:founder_releated_to_system,1'),

            HasMany::make('Images', 'images', \App\Nova\PostImage::class),
            HasMany::make('Questions'),
            HasMany::make('Post Requests', 'postrequests', \App\Nova\PostRequest::class),



            Button::make('PDF')
                ->link(URL::to('receipt?p=' . base64_encode($this->id)), '_blank')
                ->style('danger'),
            //  NovaDependencyContainer::make([

            //  DateTime::make('Losted At')->hideFromIndex(),

            // Heading::make('<p class="text-info" style="margin-left:20%">Owner Data If Filled By Admin</p>')->asHtml(),

            // NovaBelongsToDepend::make('Owner', 'owner', 'App\Nova\NormalUser')
            // ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
            //     ->placeholder('Optional Placeholder')
            //     ->options(User::NormalUsers()->get())
            //     ->rules('required'),

            //     NovaBelongsToDepend::make('Item', 'item', \App\Nova\Item::class)
            //     ->placeholder('Optional Placeholder')

            //     ->optionsResolve(function ($owner) {
            //         return $owner->items()->lost()->get();
            //     })
            //     ->dependsOn('Owner')
            //     ->rules('required'),


            // ])->dependsOn('status', 0),





            //   NovaDependencyContainer::make([

            //  DateTime::make('Founded At')->hideFromIndex(),
            // Heading::make('<p class="text-info" style="margin-left:20%">Founder Data If Filled By Admin</p>')->asHtml(),



            //  ])->dependsOn('status', 1),

            // Heading::make('<p class="text-info" style="margin-left:20%">Owner Data</p>')->asHtml()
            // ->hideWhenUpdating()
            // ->hideWhenCreating(),
            // NovaBelongsToDepend::make('Owner', 'owner', 'App\Nova\NormalUser')
            // ->withMeta(['calledFromClass' => 'App\Nova\NormalUser'])
            //     ->placeholder('Optional Placeholder')
            //     ->options(User::NormalUsers()->get())
            //     ->readonly()
            // ->hideWhenUpdating()
            // ->hideWhenCreating(),
            // BelongsTo::make('Founder', 'founder', 'App\Nova\NormalUser'),

            //  ])->dependsOn('status', '1'),

            //     NovaBelongsToDepend::make('Publisher', 'publisher', 'App\Nova\User')
            //     ->placeholder('Publisher') // Add this just if you want to customize the placeholder
            //     ->options(\App\User::all())
            //      ->withMeta(['extraAttributes' => [
            //         'readonly' => true,
            //         'disabled'=> true
            //   ]])->setAttribute( 'disabled', true),
            // BelongsTo::make('Publisher', 'publisher', 'App\Nova\NormalUser')->readonly(),

            // BelongsTo::make('Founder', 'founder', 'App\Nova\NormalUser'),
            // NovaBelongsToDepend::make('Item')
            // ->placeholder('Item')
            // ->optionsResolve(function ($user) {
            //     $user_items = [];
            //     $user_items_with_qrcode = $user->items()
            //         ->Has('qrcode')
            //         ->get();
            //     foreach ($user_items_with_qrcode as $user_item_with_qrcode) {
            //         array_push($user_items, $user_item_with_qrcode);
            //     }
            //     return $user_items;
            // })->dependsOn('publisher')->nullable()->readonly(),


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
