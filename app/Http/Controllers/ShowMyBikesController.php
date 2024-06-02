<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShowMyBikesController extends Controller
{
    /**
     * Update user show my bikes attribute.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $request->user()->update([
            'show_my_bikes' => $request->input('show_my_bikes'),
        ]);

        return Redirect::back();
    }
}
