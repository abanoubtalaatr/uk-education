<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;

class MockExam extends Resource
{
    public static $model = \App\Models\MockExam::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'price', 'link', 'date', 'description'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Image::make('Image')
            ->rules($this->imageRules($request)),
            Text::make('Name')->rules('required', 'max:255'),
            Number::make('Price')->rules('required'),
            Text::make('Link')->rules('required', 'max:255'),
            Date::make('Date')->rules('required'),
            Textarea::make('Description')->rules('required'),
            HasMany::make('Bookings'),
            BelongsToMany::make('Bank Scenario', 'bankScenarios')
        ];
    }

    protected function imageRules(Request $request)
    {
        return $request->isUpdateOrUpdateAttachedRequest()
            ? ['nullable', 'image']
            : ['required', 'image'];
    }
}
