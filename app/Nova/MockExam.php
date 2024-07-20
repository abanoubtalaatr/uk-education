<?php

namespace App\Nova;

use App\Nova\Tutor;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Outl1ne\MultiselectField\Multiselect;

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
          
            Textarea::make('Description')->rules('required'),
            DateTime::make('Date', 'date')->rules('required'),
            // new Tabs('Mock Details', [
            //     Tab::make('Mock Content', [
            //         Flexible::make('Mock Content')
            //             ->addLayout('Content', 'content', [
            //                 Textarea::make('Content')
            //             ])
            //             ->button('Add New Content'),
            //     ]),

            //     Tab::make('Who is the course for?', [
            //         Flexible::make('Who Is The Course For')
            //             ->addLayout('Audience', 'audience', [
            //                 Textarea::make('Audience')
            //             ])
            //             ->button('Add New Audience'),
            //     ]),

            //     Tab::make('Course Aims', [
            //         Flexible::make('Course Aims')
            //             ->addLayout('Aims', 'aims', [
            //                 Textarea::make('Aims')
            //             ])
            //             ->button('Add New Aim'),
            //     ]),

            //     Tab::make('Learning Objectives', [
            //         Flexible::make('Learning Objectives')
            //             ->addLayout('Objective', 'objective', [
            //                 Textarea::make('Objective')
            //             ])
            //             ->button('Add New Objective'),
            //     ]),

            //     Tab::make('Learning Outcomes', [
            //         Flexible::make('Learning Outcomes')
            //             ->addLayout('Outcome', 'outcome', [
            //                 Textarea::make('Outcome')
            //             ])
            //             ->button('Add New Outcome'),
            //     ]),
            // ]),
            HasMany::make('Bookings'),

            Multiselect::make('Tutors', 'tutors')
            ->belongsToMany(Tutor::class, false),

            Multiselect::make('Scenarios', 'scenarios')
            ->belongsToMany(Scenario::class, false),
        ];
    }

    protected function imageRules(Request $request)
    {
        return $request->isUpdateOrUpdateAttachedRequest()
            ? ['nullable', 'image']
            : ['required', 'image'];
    }

}
