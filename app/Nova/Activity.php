<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Image;
use Kristories\Qrcode\Qrcode;
use Laravel\Nova\Fields\HasMany;
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
        return array(
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
<table>
<tr>
<th>Properties</th>
<th>Old</th>
<th>New</th>
</tr>
html;
                    foreach ($arr as $key => $val){
                        $output .= '<tr>';
                        $output .= "<td>$key</td>";
                        $output .= '<td style="color: red">';
                        $output .= $val['old'] ?? '' ;
                        $output .= '</td>';
                        $output .= '<td style="color: green">';
                        $output .= $val['new'] ?? '' ;
                        $output .= '</td>';
                        $output .= '</tr>';
                    }
                    $output .= '</table>';
                    return $output;
                })->asHtml(),
            Text::make('DESCRIPTION'),
            Text::make('SUBJECT ID'),
            Text::make('SUBJECT TYPE'),
            Text::make('USER ID','causer_id'),
            Text::make('CREATED_AT'),
            NovaBelongsToDepend::make('User')
                ->placeholder('User')
                ->options(\App\User::all()),
        );
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
