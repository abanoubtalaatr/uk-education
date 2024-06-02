<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\UserResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class AttendeeController extends Controller
{
    /**
     * Get the attendee profile with common events.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function __invoke(Request $request, User $user): Response|RedirectResponse
    {
        if (!$user->show_personal_information && $request->user()->id !== $user->id) {
            return Redirect::back();
        }

        return Inertia::render('Users/Attendee', [
            'user' => UserResource::make($user->load(['city', 'interests'])),
            'events' => EventResource::collection(
                Event::query()
                    ->forUser($user->id)
                    ->forUser($request->user()->id)
                    ->with([
                        'media',
                        'users' => function (BelongsToMany $builder) use ($request) {
                            $builder->where('show_event_attendance', true);
                        },
                    ])
                    ->get()
            )
        ]);
    }
}
