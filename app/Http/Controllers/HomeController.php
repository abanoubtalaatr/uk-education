<?php

namespace App\Http\Controllers;

use App\Http\QueryBuilders\EventQueryBuilder;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\TypeResource;
use App\Models\Brand;
use App\Models\City;
use App\Models\Event;
use App\Models\Type;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\QueryBuilders\EventQueryBuilder $eventQueryBuilder
     *
     * @return \Inertia\Response
     */
    public function __invoke(Request $request, EventQueryBuilder $eventQueryBuilder): Response
    {
        return Inertia::render('Home/Index', [
            'upcomingEvents' => EventResource::collection(
                $eventQueryBuilder->future()
                    ->orderBy('created_at', 'desc')
                    ->limit(6)
                    ->get()
            ),
            'userEvents' => $request->user()
                ? EventResource::collection(
                    Event::with('media')
                        ->forUser($request->user()->id)
                        ->future()
                        ->get()
                )
                : EventResource::collection([]),
            'cities' => CityResource::collection(City::all()),
            'event_types' => TypeResource::collection(Type::all()),
            'brands' => BrandResource::collection(Brand::all()),
        ]);
    }
}
