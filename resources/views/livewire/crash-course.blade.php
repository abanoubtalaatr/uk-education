<main>
    @include('partials.nav-header')
    <!-- start add cours -->
    <div class="add-2">
        <div class="container">
            <div class="row">
                <div class="head-path">
                    <ul class="path-menu">
                        <li><a href="#">Home ></a></li>
                        <li><a href="#">Crash Courses</a></li>
                    </ul>
                    <h3>All Crash Courses</h3>
                </div>
            </div>
            <div class="row mb-3">
                @foreach ($crashCourses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ $course->id }}">
                            <img src="{{ asset('storage/'. $course->image) }}" class="card-img-top card-top img-fluid" alt="{{ $course->name }}" />
                        </a>
                        <h4 class="card-info">{{ $course->name }}</h4>
                        <a href="{{ $course->image }}" data-lightbox="roadtrip" data-title="{{ $course->name }}">
                            <div class="layout">&nbsp;</div>
                        </a>
                        <div class="card-body border p-3 mb-2 rounded">
                            <h5 class="card-title">
                                {{ implode(', ', $course->tutors->pluck('name')->toArray()) }} 
                            </h5>
                            <p>number of attendees <strong>{{\App\Services\BookingService::getAttendeesNumberInCrashCourse($course->id)}} people</strong></p>
                            {{-- <p>number of hours <strong>20h</strong></p> --}}
                            <a href="{{route('crash-courses.show', $course->id)}}" class="btn btn-join float-right">Booking Now</a>
                            <span>{{ $course->price }} $    </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{-- {{ $courses->links() }} --}}
            </div>
        </div>
    </div>
    @include('partials.footer')
</main>
