<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Get the logged-in user profile.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Inertia\Response
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Profile/Show', [
            'user' => UserResource::make(
                $request->user()->load(['interests', 'ownedBikes', 'dreamBikeBrand', 'events'])
            )
        ]);
    }
}
