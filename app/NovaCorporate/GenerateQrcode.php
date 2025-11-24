<?php

namespace App\NovaCorporate;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaErrorField\Errors;
use OwenMelbz\RadioField\RadioButton;

class GenerateQrcode extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\GenerateQrcode';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'QR Code';

    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'generate_reference_number';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'generate_reference_number',
        'type',
        'status',
        'quantity',
        'created_by',
        'created_from',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Errors::make(),
            ID::make()->sortable(),
            Text::make('Reference Number', 'generate_reference_number')
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            RadioButton::make('Type')
                ->options([
                    1 => 'Single Assign',
                    2 => 'Multi Assign',
                ])->default(1), // optional
            Number::make('Quantity Of QR Codes', 'quantity')
                ->min(1)->max(10000)->step(1)
                ->rules('required'),
            HasMany::make('QR Codes', 'qrcodes', \App\Nova\Stock::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function singularLabel()
    {
        return 'Generate';
    }

    public static function label()
    {
        return 'Generate';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereIn('created_by', Auth()->user()->corporate->users->pluck('id'));
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
