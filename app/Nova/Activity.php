<?php

namespace App\Nova;

use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Text;
use NovaErrorField\Errors;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Activity extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Activity';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Resources';


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'log_name',
        'description',
        'subject_id',
        'subject_type',
        'causer_id',
        'causer_type',
        'properties',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    public static $searchRelations = [
        'user' => ['name', 'email', 'mobile_number'],
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $types = [
            ALLPost::class,
            AllUser::class,
            Answer::class,
            Area::class,
            AssignQrcode::class,
            Banner::class,
            Brand::class,
            Category::class,
            City::class,
            ClosedPost::class,
            Color::class,
            Corporate::class,
            CorporateAdmin::class,
            CorporateUser::class,
            Country::class,
            ExpiredQRcode::class,
            GenerateQrcode::class,
            HiddenPost::class,
            Item::class,
            Keyword::class,
            Model::class,
            NormalUser::class,
            Notification::class,
            OpeningPost::class,
            Package::class,
            PackageProductMedia::class,
            Page::class,
            PendingPost::class,
            People::class,
            PostReport::class,
            PostRequest::class,
            PostType::class,
            Qrcode::class,
            Question::class,
            RejectedPost::class,
            ReportedPost::class,
            Role::class,
            Setting::class,
            Stock::class,
            SubCategory::class,
            Subscription::class,
            SuperAdmin::class,
            Support::class,
            User::class,
            Visit::class,
            WajadOffice::class,
        ];


        return [
            Errors::make(),
            ID::make()->sortable(),
            Text::make('properties')
                ->displayUsing(function ($model){
                    $arr = [];
                    if (!empty($model['old'])){
                        foreach ($model['old'] as $key => $item) {
                            $index = explode('.', $key);
                            $i = $index[0];
                            if (is_array($item)){
                                $item = implode('<br>', $item);
                            }
                            $arr[$i]['old'] = $item;
                        }
                    }
                    if (!empty($model['attributes']))
                    {
                        foreach ($model['attributes'] as $key => $item){
                            $index = explode('.', $key);
                            $i = $index[0];
                            if (is_array($item)){
                                $item = implode('<br>', $item);
                            }
                            $arr[$i]['new'] = $item;
                        }
                    }
                    $output = <<<html
<table >
<tr class="headers">
<th>Properties</th>
<th>Old</th>
<th>New</th>
<th><button type="button" onclick="hideTable()" class="coll"><h1>+</h1></button></th>
</tr>
html;
                    foreach ($arr as $key => $val){
                        $output .= '<tr class="data hide">';
                        $output .= "<td>$key</td>";
                        $output .= '<td class="old">';
                        $output .= $val['old'] ?? 'N/A' ;
                        $output .= '</td>';
                        $output .= '<td class="new">';
                        $output .= $val['new'] ?? 'N/A' ;
                        $output .= '</td>';
                        $output .= '</tr>';
                    }
                    $output .= '</table>';
                    return $output;
                })->asHtml(),
            Text::make('DESCRIPTION'),
//            Text::make('SUBJECT ID'),
//            Text::make('SUBJECT TYPE'),
//            Text::make('USER ID','causer_id'),
            MorphTo::make('subject')->types($types),
            DateTime::make('CREATED_AT'),
            NovaBelongsToDepend::make('User')
                ->placeholder('User')
                ->options(\App\User::all()),
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
        return [];
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
        return  '<img class="sidebar-icon" src="/images/icons/scroll.png" style="height:22px;width:22px;margin=10px" />';
    }
    public  function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
