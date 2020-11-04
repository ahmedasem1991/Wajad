<?php

namespace App\NovaCorporate;

use App\Nova\Resource;
use NovaButton\Button;
use Naif\Toggle\Toggle;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\MorphMany;
use Illuminate\Support\Facades\URL;
use Comodolab\Nova\Fields\Help\Help;
use NovaErrorField\Errors;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Depsimon\NovaStripeCheckoutField\NovaStripeCheckoutField;

class Package extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Package';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Packages';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        return $this->name_en . ' - ' . $this->name_ar;
    }

    public static function availableForNavigation(Request $request)
    {
        return  (Auth()->User()->hasPermissionTo('packages')) ? true :false;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'price',
        'type',
        'quantity',
        'period',
        'is_active',
        'incrementally',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {

        $feild=Help::make('Package Information');
        if ($request->session()->has('success_payment')) {
            $message=  $request->session()->get('success_payment');
            $feild= Help::info($message,'Your QR Codes Will generated now.');
        }
        if ($request->session()->has('error_payment')) {
            $message=  $request->session()->get('error_payment');
            $feild= Help::danger($message,'Try again later.');
        }
        return [
            Errors::make(),
            $feild,
            ID::make()->sortable(),
            Text::make('Package English Name', 'name_en')
                ->rules(['required', 'string', 'max:255']),

            Text::make('Package Arabic Name', 'name_ar')
                ->rules(['required', 'string', 'max:255']),

            Textarea::make('Package English Description', 'description_en')
                ->rules(
                    ['required', 'string']
                )->hideFromIndex(),

            Textarea::make('Package Arabic Description', 'description_ar')
                ->rules(
                    ['required', 'string']
                )->hideFromIndex(),
            Heading::make('<p class="text-info" style="margin-left:20%"> Package  Price In <big>SAR</big> Unit </p>')
                ->asHtml(),
            Number::make('Package Price', 'price')
                ->rules(['required', 'integer'])
                ->hideWhenUpdating(),

            Number::make('Package Period', 'period')->rules('required'),
            Number::make('Quantity Of QR Codes', 'quantity')->rules('required'),

            RadioButton::make('Type')
                ->options([
                    1 => 'Single Assign',
                    2 => 'Multi Assign',
                ])->default(1), // optional
            Button::make('PayPal')
                ->link(URL::to('paypal?p='.base64_encode($this->id)),'_self')
                ->style('primary'),

            Button::make('Paytabs')
                ->link(URL::to('paytabs?p='.base64_encode($this->id)),'_self')
                ->style('info'),
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
     *-
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
        return  '<img class="sidebar-icon" src="/images/icons/package.png" style="height:22px;width:22px;margin=10px" />';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('is_active',1);
    }
    public  function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
