<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class AttendEventController extends Controller
{
    /**
     * Mark the user as attended in the event
     *
     * @param \App\Models\Event $event
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Event $event, User $user): RedirectResponse
    {
        if (! Gate::allows('attend-event')) {
            abort(403);
        }

        if ($event->users()->where('users.id', $user->id)->exists()) {
            $event->users()->updateExistingPivot($user->id, [
                'attended' => true,
            ]);
        }

        return Redirect::back();
    }

    /**
     * Mark the user as un-attended in the event
     *
     * @param \App\Models\Event $event
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Event $event, User $user): RedirectResponse
    {
        if (! Gate::allows('attend-event')) {
            abort(403);
        }

        if ($event->users()->where('users.id', $user->id)->exists()) {
            $event->users()->updateExistingPivot($user->id, [
                'attended' => false
            ]);
        }

        return Redirect::back();
    }
}
