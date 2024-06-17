<?php

namespace App\Http\Controllers\Onboarding;

use App\Constants\OnboardingSteps;
use App\Http\Controllers\Controller;
use App\Http\Requests\Onboarding\InterestRequest;
use App\Http\Resources\InterestResource;
use App\Models\Interest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class InterestController extends Controller
{
    /**
     * Return the form for user entering interests.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function create(Request $request): Response|RedirectResponse
    {
        if ($request->user()->completed_onboarding) {
            // return Redirect::route("home");
        }

        return Inertia::render("OnBoarding/Interests", [
            "step" => 5,
            "interests" => InterestResource::collection(Interest::all()),
        ]);
    }

    /**
     * Submit the data for user interests.
     *
     * @param \App\Http\Requests\Onboarding\InterestRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InterestRequest $request): RedirectResponse
    {
        if ($request->filled('interests')) {
            $request->user()->interests()->sync($request->input('interests'));
        }

        $request->user()->update([
            "onboarding_step" => OnboardingSteps::FINISHED,
            "completed_onboarding" => true,
        ]);

        return Redirect::route('events.index');
    }
}
