<main>
    @include('partials.nav-header')
    <!-- start add cours -->
    <div class="add-2">
        <div class="container">
            <div class="row">
                <div class="head-path">
                    <ul class="path-menu">
                        <li><a href="#">Home ></a></li>
                        <li><a href="#">Subscriptions</a></li>
                    </ul>
                    {!! \Outl1ne\NovaSettings\NovaSettings::getSetting('subscription_description') !!}

                    <h3 class="mt-4">All Subscriptions</h3>
                </div>
            </div>
            <div class="row mb-3">
                @foreach ($subscriptions as $subscription)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ $subscription->id }}">
                            <img src="{{ asset('storage/'. $subscription->image) }}" class="card-img-top card-top img-fluid" alt="{{ $subscription->name }}" />
                        </a>
                        <h4 class="card-info">{{ $subscription->name }}</h4>
                        <a href="{{ $subscription->image }}" data-lightbox="roadtrip" data-title="{{ $subscription->name }}">
                            <div class="layout">&nbsp;</div>
                        </a>
                        <div class="card-body border p-3 mb-2 rounded">
                            <h5 class="card-title">
                                {{ implode(', ', $subscription->tutors->pluck('name')->toArray()) }} 
                            </h5>
                            <p>number of attendees <strong>{{\App\Services\BookingService::getAttendeesNumberInSubscription($subscription->id)}} people</strong></p>
                            {{-- <p>number of hours <strong>20h</strong></p> --}}
                            <a href="{{route('subscriptions.show', $subscription->id)}}" class="btn btn-join float-right">Booking Now</a>
                            <span>{{ $subscription->price }} $    </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{-- {{ $subscriptions->links() }} --}}
            </div>
        </div>
    </div>
    @include('partials.footer')
</main>
