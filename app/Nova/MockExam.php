<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
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
            DateTime::make('Date', 'date')->rules('required'),
            new Tabs('Mock Details', [
                Tab::make('Mock Content', [
                    Flexible::make('Mock Content')
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
