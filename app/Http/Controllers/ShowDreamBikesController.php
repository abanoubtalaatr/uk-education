<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShowDreamBikesController extends Controller
{
    /**
     * Update user show dream bikes attribute.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->user()->update([
            'show_dream_bikes' => $request->input('show_dream_bikes'),
        ]);

        return Redirect::back();
    }
}
