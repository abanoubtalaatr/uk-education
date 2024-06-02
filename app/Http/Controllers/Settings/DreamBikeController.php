<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\BikeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class DreamBikeController extends Controller
{
    public function __invoke(BikeRequest $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        return Redirect::back();
    }
}
