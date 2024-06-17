<?php

namespace App\Http\Controllers\Onboarding;

use App\Constants\OnboardingSteps;
use App\Http\Controllers\Controller;
use App\Http\Requests\Onboarding\BasicInfoRequest;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\VehicleTypeResource;
use App\Models\Brand;
use App\Models\City;
use App\Models\UserBrandPivot;
use App\Models\VehicleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PersonalInfoController extends Controller
{
    /**
     * Return the form for user entering basic info.
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

        $request->user()->update([
            "onboarding_step" => OnboardingSteps::PERSONAL_INFO,
        ]);

        return Inertia::render("OnBoarding/PersonalInformation", [
            "step" => 0,
            "cities" => CityResource::collection(City::all()),
            "brands" => BrandResource::collection(Brand::with("models")->get()),
            'types' => VehicleTypeResource::collection(VehicleType::all()),
        ]);
    }

    /**
     * Submit the data for user dream models.
     *
     * @param \App\Http\Requests\Onboarding\BasicInfoRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BasicInfoRequest $request): RedirectResponse
    {
        $data = $request->except([
            'model',
            'brand_id',
        ]);

        $data["onboarding_step"] = OnboardingSteps::BRANDS;
        $data['city_id'] = $request->input('city');

        $request->user()->update($data);

        if ($request->filled('brand_id') && $request->filled('model')) {
            if ($request->hasFile('bike_photo')) {
                $filePath = $request->file('bike_photo')->storeAs('bikes');
            }
            UserBrandPivot::create([
                'user_id' => $request->user()->id,
                'model' => $request->input('model'),
                'brand_id' => $request->input('brand_id'),
                'vehicle_type_id' => $request->input('vehicle_type_id'),
                'bike_photo' => $filePath ?? null,
            ]);
        }

        return Redirect::route("user-brands.create");
    }
}
