<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Textarea;

class Subscription extends Resource
{
    public static $model = \App\Models\Subscription::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'price', 'description', 'number_of_free_videos'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Image')->rules('required', 'max:255'),
            Text::make('Name')->rules('required', 'max:255'),
            Number::make('Price')->rules('required'),
            Textarea::make('Description')->rules('required'),
            Number::make('Number of Free Videos')->rules('required'),
            HasMany::make('Videos'),
            HasMany::make('Bookings')
        ];
    }
}
