<?php

namespace App\Http\QueryBuilders;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventQueryBuilder extends BaseQueryBuilder
{
    public function __construct(Request $request)
    {
        // $query = Event::query()->orderBy('start_date', 'desc')->with('media');

        // $query->when($request->filled('city'), function (Builder $builder) use ($request) {
        //     $builder->whereIn('city_id', $request->input('city'));
        // });

        // if (Auth::check()) {
        //     $query->when($request->user()->show_events_my_city == true, function (Builder $builder) use ($request) {
        //         $builder->where('city_id', $request->user()->city_id);
        //     });
        // }

        // $query->when($request->filled('event_type'), function (Builder $builder) use ($request) {
        //     $builder->whereIn('type_id', $request->input('event_type'));
        // });

        // $query->when($request->filled('brand'), function (Builder $builder) use ($request) {
        //     $builder->whereHas('brands', function (Builder $builder) use ($request) {
        //         $builder->whereIn('brands.id', $request->input('brand'));
        //     });
        // });

        // $query->when($request->filled('date'), function (Builder $builder) use ($request) {
        //     $builder->whereDate('start_date', "<=", $request->input('date'))
        //         ->whereDate('end_date', '>=', $request->input('date'));
        // });

        // $query->when($request->filled('search'), function (Builder $builder) use ($request) {
        //     $builder->search($request->input('search'));
        // });

        // $query->when($request->filled('type'), function (Builder $builder) use ($request) {
        //     if ($request->input('type') == 'previous-events ') {
        //         $builder->where('start_date', '<', now());
        //     }
        //     if ($request->input('type') == 'upcoming-events') {
        //         $builder->where('start_date', '>', now());
        //     }
        // });


        // parent::__construct($query);
    }
}
