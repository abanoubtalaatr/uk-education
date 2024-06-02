<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Onboarding\InterestRequest;
use App\Http\Resources\InterestResource;
use App\Http\Resources\UserResource;
use App\Models\Interest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class InterestsSettingsController extends Controller
{
    /**
     * Display the user interests update form.
     */
    public function show(Request $request): Response
    {
        return Inertia::render('Profile/Settings/Interests', [
            'user' => UserResource::make(
                $request->user()->load(['interests'])
            ),
            'interests' => InterestResource::collection(
                Interest::whereNotIn('id', $request->user()->interests->pluck('id'))
                    ->get())
        ]);
    }

    /**
     * Update the user interests.
     *
     * @param \App\Http\Requests\Onboarding\InterestRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(InterestRequest $request): RedirectResponse
    {
        $request->user()->interests()->sync($request->input('interests'));

        if ($request->has('show_interests')) {
            $request->user()->update([
                'show_interests' => $request->input('show_interests'),
            ]);
        }

        return Redirect::back();
    }
}
