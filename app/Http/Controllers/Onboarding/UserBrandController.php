<?php

namespace App\Http\Controllers\Onboarding;

use App\Constants\OnboardingSteps;
use App\Http\Controllers\Controller;
use App\Http\Requests\Onboarding\UserBrandRequest;
use App\Http\Resources\BrandResource;
use App\Http\Resources\VehicleTypeResource;
use App\Models\Brand;
use App\Models\VehicleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserBrandController extends Controller
{
    /**
     * Return the form for user entering dream brands.
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

        return Inertia::render("OnBoarding/DreamBrands", [
            "step" => 1,
            "featured_brands" => BrandResource::collection(Brand::where('is_featured', true)->get()),
            "other_brands" => BrandResource::collection(
                Brand::where('is_featured', false)
                    ->orWhereNull('is_featured')
                    ->get()
            ),
            'types' => VehicleTypeResource::collection(VehicleType::all()),
        ]);
    }

    /**
     * Submit the data for user dream brands.
     *
     * @param \App\Http\Requests\Onboarding\UserBrandRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserBrandRequest $request): RedirectResponse
    {
        $request->user()->update(array_merge($request->validated(), [
            "onboarding_step" => OnboardingSteps::PHONE
        ]));

        return Redirect::route('phone.create');
    }
}
