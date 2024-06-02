<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\PrivacySettingsRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PrivacySettingsController extends Controller
{
    /**
     * Display the privacy settings edit form.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Inertia\Response
     */
    public function show(Request $request): Response
    {
        return Inertia::render('Profile/Settings/Privacy', [
            'user' => UserResource::make($request->user())
        ]);
    }

    /**
     * Update the user privacy settings.
     *
     * @param \App\Http\Requests\Settings\PrivacySettingsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PrivacySettingsRequest $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        return Redirect::back();
    }
}
