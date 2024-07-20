<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;


class Topic extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Topic>
     */
    public static $model = \App\Models\Topic::class;

    public static function label()
    {
        return __('Chapters');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Chapter');
    }
    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Subscription')->rules('required'),
            Text::make('Name')->rules('required'),
            Trix::make('Description')->rules('required'),
            Image::make('Image'),
            File::make('PDF', 'pdf'),
            File::make('Video', 'video'),
            Boolean::make('Is Paid', 'is_paid')->rules('required'),
            HasMany::make('Videos')
        ];
    }

    protected function imageRules(Request $request)
    {
        return $request->isUpdateOrUpdateAttachedRequest()
            ? ['nullable', 'image']
            : ['required', 'image'];
    }


    protected function pdfRules(Request $request)
    {
        return $request->isUpdateOrUpdateAttachedRequest()
            ? ['nullable', 'pdf']
            : ['required', 'pdf'];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
