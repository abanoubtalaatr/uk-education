<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Inertia\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request): Response|RedirectResponse
    {
        if (!$request->user()->completed_onboarding) {
            return Redirect::route('personal-info.create');
        }

        return Inertia::render('Dashboard');
    }
}
