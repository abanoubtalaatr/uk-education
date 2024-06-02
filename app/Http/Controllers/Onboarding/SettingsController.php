<?php

namespace App\Http\Controllers\Onboarding;

use App\Constants\OnboardingSteps;
use App\Http\Controllers\Controller;
use App\Http\Requests\Onboarding\SettingsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class SettingsController extends Controller
{
    /**
     * Return the form for user entering settings.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function create(Request $request): Response|RedirectResponse
    {
        if ($request->user()->completed_onboarding) {
            return Redirect::route("home");
        }

        return Inertia::render("OnBoarding/Settings", [
            "step" => 4,
        ]);
    }

    /**
     * Submit the data for user settings.
     *
     * @param \App\Http\Requests\Onboarding\SettingsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SettingsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data["onboarding_step"] = OnboardingSteps::INTERESTS;

        $request->user()->update($data);

        return Redirect::route("interests.create");
    }
}
