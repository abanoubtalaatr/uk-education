<div>
    @include('partials.nav-header')

            <div class="container-fluid y-side">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center mt-2">
                        <button class="btn btn-join mr-2" wire:click.prevent="previousWeek">Previous Week</button>
                        <button class="btn btn-join mr-2" wire:click.prevent="nextWeek">Next Week</button>
                    </div>
                    <p class="mb-0 mr-2 border">{{ $currentWeek }}</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sunday</th>
                                <th class="text-center">Monday</th>
                                <th class="text-center">Tuesday</th>
                                <th class="text-center">Wednesday</th>
                                <th class="text-center">Thursday</th>
                                <th class="text-center">Friday</th>
                                <th class="text-center">Saturday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                                    <td class="">
                                        <div class="day">
                                            @if (isset($bookings[$day]) && count($bookings[$day]) > 0)
                                                @foreach ($bookings[$day] as $booking)
                                                    <div class="booking pl-1 my-2 rounded border cursor-pointer">
                                                        @if($booking->user)
                                                        <p class="mb-1" style="font-size: 12px"><strong>Student:</strong> {{ $booking->user?->name }}</p>
                                                        @endif
                                                        <p class="mb-0" style="font-size: 12px"><strong>Time:</strong> {{ \Carbon\Carbon::parse($booking->start_at)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_at)->format('H:i') }}</p>
                                                        <p class="mb-1" style="font-size: 12px"><strong>Type :</strong> {{ $booking->type }}</p>
                                                        <p class="mb-1" style="font-size: 12px"><strong>Details :</strong> <a target="_blank" href="{{ $booking->details_route }}">Show</a></p>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="mb-0">No bookings</p>
                                            @endif
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
