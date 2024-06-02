<?php

namespace App\Http\Controllers\Onboarding;

use App\Constants\OnboardingSteps;
use App\Http\Controllers\Controller;
use App\Http\Requests\Onboarding\PhoneNumberVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PhoneVerificationController extends Controller
{
    /**
     * Return the form for user entering phone number verification code.
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

        return Inertia::render("OnBoarding/PhoneNumberVerification", [
            "step" => 3,
        ]);
    }

    /**
     * Submit the data for user phone number verification.
     *
     * @param \App\Http\Requests\Onboarding\PhoneNumberVerificationRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PhoneNumberVerificationRequest $request): RedirectResponse
    {
        if ($request->input('code') == $request->user()->phone_code) {
            $request->user()->update([
                'phone_verified_at' => now(),
                "onboarding_step" => OnboardingSteps::SETTINGS,
            ]);

            return Redirect::route("settings.create");
        }

        return Redirect::back()->withErrors([
            'code' => "The selected code is invalid."
        ]);
    }
}
