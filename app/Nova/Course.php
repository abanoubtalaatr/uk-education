<?php

namespace App\Nova;


use Eminiarts\Tabs\Tab;
use Laravel\Nova\Panel;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\DateTime ;
use App\Nova\Fields\BookingsCalendar;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class Course extends Resource
{
    public static $model = \App\Models\Course::class;

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),        
            
            Text::make('Name', 'name')->rules('required'),
            Trix::make('Description','description')->rules('required'),
            Image::make('Image', 'image'),
            Number::make('Price', 'price')->rules('required'),
            Text::make('Link', 'link')->rules('required'),
            DateTime::make('Date', 'date')->rules('required'),
        ];
    }

    protected function imageRules(Request $request)
    {
        return $request->isUpdateOrUpdateAttachedRequest()
            ? ['nullable', 'image']
            : ['required', 'image'];
    }

   
}
