<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventAttendanceRequest;
use App\Mail\UserAttendEventMail;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class EventAttendanceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\EventAttendanceRequest $request
     * @param \App\Models\Event $event
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EventAttendanceRequest $request, Event $event): RedirectResponse
    {
        if ($event->end_date->isPast()) {
            return Redirect::back()->withErrors([
                'date' => __('Event has already passed')
            ]);
        }

        if ($event->users()->count() >= $event->number_of_seats) {
            return Redirect::back()->withErrors([
                'number_of_seats' => __('Event has reached maximum number of seats')
            ]);
        }

        $event->users()->attach($request->user());

        Mail::to($request->user())->send(new UserAttendEventMail($event, $request->user()));

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Event $event): RedirectResponse
    {
        $event->users()->detach($request->user());

        return Redirect::back();
    }
}
