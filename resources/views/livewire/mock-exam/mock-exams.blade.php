<main>
    @include('partials.nav-header')
    <!-- start add cours -->
    <div class="add-2">
        <div class="container">
            <div class="row">
                <div class="head-path">
                    <ul class="path-menu">
                        <li><a href="#">Home ></a></li>
                        <li><a href="#">Mock exams</a></li>
                    </ul>
                    <h3>All Mock exams</h3>
                </div>
            </div>
            <div class="row mb-3">
                @foreach ($mockExams as $mockExam)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ $mockExam->id }}">
                            <img src="{{ asset('storage/'. $mockExam->image) }}" class="card-img-top card-top img-fluid" alt="{{ $mockExam->name }}" />
                        </a>
                        <h4 class="card-info">{{ $mockExam->name }}</h4>
                        <a href="{{ $mockExam->image }}" data-lightbox="roadtrip" data-title="{{ $mockExam->name }}">
                            <div class="layout">&nbsp;</div>
                        </a>
                        <div class="card-body border p-3 mb-2 rounded">
                            <h5 class="card-title">
                                {{ implode(', ', $mockExam->tutors->pluck('name')->toArray()) }} 
                            </h5>
                            <p>number of attendees <strong>{{\App\Services\BookingService::getAttendeesNumberInMockExam($mockExam->id)}} people</strong></p>
                            {{-- <p>number of hours <strong>20h</strong></p> --}}
                            <a href="course-details.html" class="btn btn-join float-right">Booking Now</a>
                            <span>{{ $mockExam->price }} $    </span>
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
