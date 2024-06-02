<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\NotificationSettingsRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class NotificationSettingsController extends Controller
{
    /**
     * Display the notifications edit form.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Inertia\Response
     */
    public function show(Request $request): Response
    {
        return Inertia::render('Profile/Settings/Notification', [
            'user' => UserResource::make($request->user())
        ]);
    }

    /**
     * Update the user notification settings.
     *
     * @param \App\Http\Requests\Settings\NotificationSettingsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NotificationSettingsRequest $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        return Redirect::back();
    }
}
