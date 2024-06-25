<?php

namespace App\Nova;


use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\DateTime ;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Fields\Textarea;

class Course extends Resource
{
    public static $model = \App\Models\Course::class;

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name')->rules('required'),
            Textarea::make('Description','description')->rules('required'),
            Image::make('Image', 'image')->rules('required'),
            Number::make('Price', 'price')->rules('required'),
            Text::make('Link', 'link')->rules('required'),
            DateTime::make('Date', 'date')->rules('required'),
            new Tabs('Course Details', [
                Tab::make('Course Content', [
                    Flexible::make('Course Content')
                        ->addLayout('Content', 'content', [
                            Text::make('Content')
                        ])
                        ->button('Add New Content'),
                ]),

                Tab::make('Who is the course for?', [
                    Flexible::make('who_is_the_course_for')
                        ->addLayout('Audience', 'audience', [
                            Text::make('Audience')
                        ])
                        ->button('Add New Audience'),
                ]),

                Tab::make('Course Aims', [
                    Flexible::make('Course Aims')
                        ->addLayout('Aims', 'aims', [
                            Text::make('Aims')
                        ])
                        ->button('Add New Aim'),
                ]),

                Tab::make('Learning Objectives', [
                    Flexible::make('Learning Objectives')
                        ->addLayout('Objective', 'objective', [
                            Text::make('Objective')
                        ])
                        ->button('Add New Objective'),
                ]),

                Tab::make('Learning Outcomes', [
                    Flexible::make('Learning Outcomes')
                        ->addLayout('Outcome', 'outcome', [
                            Text::make('Outcome')
                        ])
                        ->button('Add New Outcome'),
                ]),
            ]),
        ];
    }
}
