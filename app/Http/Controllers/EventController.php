<?php

namespace App\Http\Controllers;

use App\Http\QueryBuilders\EventQueryBuilder;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\SurveyResource;
use App\Http\Resources\TypeResource;
use App\Models\Brand;
use App\Models\City;
use App\Models\Event;
use App\Models\Type;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\QueryBuilders\EventQueryBuilder $eventQueryBuilder
     *
     * @return \Inertia\Response
     */
    public function index(EventQueryBuilder $eventQueryBuilder): Response
    {
        return Inertia::render('Event/Index', [
            'events' => EventResource::collection($eventQueryBuilder->paginate()),
            'cities' => CityResource::collection(City::all()),
            'event_types' => TypeResource::collection(Type::all()),
            'brands' => BrandResource::collection(Brand::all()),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @param \Illuminate\Http\Request $request
     *
     * @return \Inertia\Response
     */
    public function show(Event $event, Request $request): Response
    {
        return Inertia::render('Event/Show', [
            'event' => EventResource::make($event->load([
                'users' => function (BelongsToMany $builder) {
                    $builder->where('show_event_attendance', true);
                },
                'interests',
                'media',
                'city'
            ])),
            'survey' => $event->survey ? SurveyResource::make($event->survey) : [],
            'attending' => $event->users()->where('users.id', $request->user()->id)->exists(),
            'attended' => $event->users()->where('users.id', $request->user()?->id)->wherePivot('attended', true)->exists(),
        ]);
    }
}
