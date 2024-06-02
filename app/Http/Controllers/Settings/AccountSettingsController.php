<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\AccountSettingsRequest;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\VehicleTypeResource;
use App\Models\Brand;
use App\Models\City;
use App\Models\VehicleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class AccountSettingsController extends Controller
{
    /**
     * Display the update account settings form.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Inertia\Response
     */
    public function show(Request $request): Response
    {

        return Inertia::render('Profile/Settings/AccountSettings', [
            'user' => UserResource::make(
                $request->user()->load(['ownedBikes', 'dreamBikeBrand', 'dreamBikeType'])
            ),
            'cities' => CityResource::collection(City::all()),
            'brands' => BrandResource::collection(Brand::all()),
            'types' => VehicleTypeResource::collection(VehicleType::all()),
        ]);
    }

    /**
     * Update the user account settings.
     *
     * @param \App\Http\Requests\Settings\AccountSettingsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AccountSettingsRequest $request): RedirectResponse
    {

        $request->user()->update($request->validated());

        if ($request->input('profile_picture_removed')) {
            $request->user()->media->firstWhere('collection_name', 'profile_picture')?->delete();
        }

        if ($request->hasFile('profile_picture')) {
            $request->user()->addMedia($request->file('profile_picture'))->toMediaCollection('profile_picture');
        }

        return Redirect::back();
    }
}
