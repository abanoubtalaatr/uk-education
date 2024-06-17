<?php

namespace App\Http\Controllers\Onboarding;

use App\Constants\OnboardingSteps;
use App\Events\UserPhoneNumberUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Onboarding\PhoneNumberRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PhoneController extends Controller
{
    /**
     * Return the form for user entering phone number.
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

        return Inertia::render("OnBoarding/PhoneNumber", [
            "step" => 2,
        ]);
    }

    /**
     * Submit the data for user phone number.
     *
     * @param \App\Http\Requests\Onboarding\PhoneNumberRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PhoneNumberRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data["onboarding_step"] = OnboardingSteps::PHONE_VERIFICATION;
        $data["phone_code"] = '1234';

        $request->user()->update($data);

        //TODO send real message
        UserPhoneNumberUpdated::dispatch($request->user());

        return Redirect::route("settings.create");
    }
}
