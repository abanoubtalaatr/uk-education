<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\BikeRequest;
use App\Models\UserBrandPivot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class BikeController extends Controller
{
    /**
     * Store a new bike for the user.
     *
     * @param \App\Http\Requests\Settings\BikeRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BikeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('bike_photo')) {
            $filePath = $request->file('bike_photo')->store();
            $data['bike_photo'] = $filePath;
        }
        UserBrandPivot::create(array_merge($data, [
            'user_id' => $request->user()->id,
        ]));

        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Settings\BikeRequest $request
     * @param \App\Models\UserBrandPivot $bike
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BikeRequest $request, UserBrandPivot $bike): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('bike_photo')) {
            $filePath = $request->file('bike_photo')->store();
            $data['bike_photo'] = $filePath;
        }
        $bike->update($data);

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserBrandPivot $bike
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(UserBrandPivot $bike): RedirectResponse
    {
        $bike->delete();

        return Redirect::back();
    }
}
