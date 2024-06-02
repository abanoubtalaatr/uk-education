<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HelpController extends Controller
{
    /**
     * Show the help page
     *
     * @return \Inertia\Response
     */
    public function __invoke(): Response
    {
        return Inertia::render('Profile/Settings/Help');
    }
}
