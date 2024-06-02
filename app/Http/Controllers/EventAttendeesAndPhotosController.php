<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\SurveyResource;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EventAttendeesAndPhotosController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @param \Illuminate\Http\Request $request
     *
     * @return \Inertia\Response
     */
    public function __invoke(Event $event, Request $request): Response
    {
        return Inertia::render('Event/Details', [
            'event' => EventResource::make($event->load([
                'users' => function (BelongsToMany $builder) use ($request) {
                    $builder->where('show_event_attendance', true)
                        ->where('name', 'like', "%{$request->input('search')}%");
                },
                'interests',
                'media',
                'city'
            ])),
            'survey' => $event->survey ? SurveyResource::make($event->survey) : [],
            'attending' => $event->users()->where('users.id', $request->user()->id)->exists(),
            'attended' => $event->users()->where('users.id', $request->user()->id)->wherePivot('attended', true)->exists(),
        ]);
    }
}
