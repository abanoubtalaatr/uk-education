<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class AttendEventQRController extends Controller
{
    /**
     * Mark the user as attended in the event
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Event $event, User $user): RedirectResponse
    {
        if (! Gate::allows('attend-event')) {
            abort(403);
        }

        $user = $event->users()->where('users.id', $user->id)->first();

        if ($user && !$user->pivot->attended) {
            $event->users()->updateExistingPivot($user->id, [
                'attended' => true
            ]);
        } elseif ($user && $user->pivot->attended) {
            return Redirect::route('attendance.used');
        } else {
            abort(404);
        }

        return Redirect::route('events.details', [
            'event' => $event,
            'tab' => 'attendees'
        ]);
    }
}
