<?php

namespace App\Http\Controllers;

use App\Http\QueryBuilders\EventQueryBuilder;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Inertia\Inertia;
use Inertia\Response;

class PublicEventController extends Controller
{
    /**
     * Get a listing of the resource.
     *
     * @param \App\Http\QueryBuilders\EventQueryBuilder $eventQueryBuilder
     * @return \Inertia\Response
     */
    public function index(EventQueryBuilder $eventQueryBuilder): Response
    {
        return Inertia::render('Public/Events/Index', [
            'events' => EventResource::collection($eventQueryBuilder->paginate()),
        ]);
    }

    public function show(Event $event): Response
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
        ]);
    }
}
