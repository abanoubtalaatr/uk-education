<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Outl1ne\MultiselectField\Multiselect;

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
            Image::make('Image'),
            File::make('Video','video'),
            Text::make('Name')->rules('required', 'max:255'),
            Number::make('Price')->rules('required'),
            Trix::make('Description')->rules('required'),
            HasMany::make('Topics'),

            HasMany::make('Bookings')
        ];
    }

    protected function imageRules(Request $request)
    {
        return $request->isUpdateOrUpdateAttachedRequest()
            ? ['nullable', 'image']
            : ['required', 'image'];
    }

    protected function videoRules(Request $request)
    {
        return $request->isUpdateOrUpdateAttachedRequest()
            ? ['nullable', ]
            : ['required'];
    }
}
