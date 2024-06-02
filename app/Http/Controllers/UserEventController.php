<?php

namespace App\Http\Controllers;

use App\Http\QueryBuilders\EventQueryBuilder;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\TypeResource;
use App\Models\Brand;
use App\Models\City;
use App\Models\Type;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Inertia\Inertia;
use Inertia\Response;

class UserEventController extends Controller
{
    /**
     * Get events that the user attended or going to attend.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Inertia\Response
     */
    public function __invoke(Request $request): Response
    {
        $futureEventQueryBuilder = App::make(EventQueryBuilder::class);
        $pastEventQueryBuilder = App::make(EventQueryBuilder::class);

        return Inertia::render("MyEvents/Index", [
            'futureEvents' => EventResource::collection(
                $futureEventQueryBuilder
                    ->forUser($request->user()->id)
                    ->future()
                    ->get()
            ),
            'pastEvents' => EventResource::collection(
                $pastEventQueryBuilder
                    ->forUser($request->user()->id)
                    ->past()
                    ->with([
                        'users' => function (BelongsToMany $builder) use ($request) {
                            $builder->where('show_event_attendance', true);
                        },
                    ])
                    ->get()
            ),
            'cities' => CityResource::collection(City::all()),
            'event_types' => TypeResource::collection(Type::all()),
            'brands' => BrandResource::collection(Brand::all()),
        ]);
    }
}
