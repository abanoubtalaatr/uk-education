<div>
<main>
    @include('partials.nav-header')
    <!-- start add course -->
    <div class="add-2">
        <div class="container">
            <div class="row">
                <div class="head-path">
                    <ul class="path-menu">
                        <li><a href="#">Home ></a></li>
                        <li><a href="#">Mock exams</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs border-bottom-0" id="myTab" role="tablist">
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                <span>Our Plab2 Mocks</span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="course-for-tab" data-toggle="tab" data-target="#course-for" type="button" role="tab" aria-controls="course-for" aria-selected="false">
                                <span>Why is it important</span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="course-aims-tab" data-toggle="tab" data-target="#course-aims" type="button" role="tab" aria-controls="course-aims" aria-selected="false">
                                <span>When to take a mock</span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="learning-objectives-tab" data-toggle="tab" data-target="#learning-objectives" type="button" role="tab" aria-controls="learning-objectives" aria-selected="false">
                                <span>Mock results and feedback</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content tab-content-responsive border mx-1 rounded py-3 my-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @foreach ($ourPlab2Mocks as $content)
                                <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                    <p class="mb-0">{{ $content['attributes']['plab2_mocks'] }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="course-for" role="tabpanel" aria-labelledby="course-for-tab">
                            <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                @foreach ($whyIsItImportant as $content)
                                    <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                        <p class="mb-0">{{ $content['attributes']['important'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="course-aims" role="tabpanel" aria-labelledby="course-aims-tab">
                            <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                @foreach ($whenToTakeAMock as $content)
                                    <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                        <p class="mb-0">{{ $content['attributes']['when'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="learning-objectives" role="tabpanel" aria-labelledby="learning-objectives-tab">
                            <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                @foreach ($mockResultsAndFeedback as $content)
                                    <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                        <p class="mb-0">{{ $content['attributes']['feedback'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="mt-2">Book Your Mock</h3>
            <div class="row mb-3">
                @foreach ($mockExams as $mockExam)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card flex-fill shadow-sm">
                            <a href="{{ $mockExam->id }}">
                                <img src="{{ asset('storage/' . $mockExam->image) }}" class="card-img-top img-fluid" alt="{{ $mockExam->name }}" />
                            </a>
                            <div class="card-body border p-3 rounded">
                                <h4 class="card-title">{{ $mockExam->name }}</h4>
                                {{-- <h5 class="card-subtitle mb-2 text-muted">{{ implode(', ', $mockExam->tutors->pluck('name')->toArray()) }}</h5> --}}
                                {{-- <p class="card-text">Number of attendees: <strong>{{ \App\Services\BookingService::getAttendeesNumberInMockExam($mockExam->id) }} people</strong></p> --}}
                                <a href="{{ route('mock-exams.book-mock', $mockExam->id) }}" class="btn btn-primary">Find Your Tutors Available</a>
                                <span class="d-block mt-2">{{ $mockExam->price }} £</span>
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

<style>
    .path-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }
    .path-menu li {
        margin-right: 10px;
    }
    .path-menu a {
        text-decoration: none;
        color: #007bff;
    }
    .head-path {
        margin-bottom: 20px;
    }
    .add-2 {
        padding: 20px 0;
    }
    .card {
        border: none;
        display: flex;
        flex-direction: column;
    }
    .card-body {
        background-color: #fff;
        flex-grow: 1;
    }
    .card-img-top {
        transition: transform 0.3s;
    }
    .card-img-top:hover {
        transform: scale(1.05);
    }
    .card-title {
        font-size: 1.2rem;
        color: #333;
    }
    .card-subtitle {
        font-size: 1rem;
        color: #666;
    }
    .card-text {
        font-size: 0.9rem;
        color: #666;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .nav-tabs .nav-link {
        border: none;
        color: #007bff;
        padding: 10px 15px;
        transition: background-color 0.3s, color 0.3s;
    }
    .nav-tabs .nav-link:hover {
        background-color: #f8f9fa;
        color: #0056b3;
    }
    .tab-content-responsive {
        background-color: #fff;
    }
</style>

@push('scripts')
<script>
    Livewire.on('dateSelected', date => {
        Livewire.emit('dateSelected', date);
    });
</script>
@endpush
</div>