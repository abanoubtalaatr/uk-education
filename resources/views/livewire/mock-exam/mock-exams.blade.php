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
                    <p>
                        {!! \Outl1ne\NovaSettings\NovaSettings::getSetting('mock_description') !!}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 my-3">
                    <ul class="nav nav-tabs border-bottom-0" id="myTab" role="tablist">
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="home-tab" data-toggle="tab" data-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <span>Mock Content</span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="course-for-tab" data-toggle="tab"
                                data-target="#course-for" type="button" role="tab" aria-controls="course-for"
                                aria-selected="false">
                                <span>Who Is The Course For</span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="course-aims-tab" data-toggle="tab"
                                data-target="#course-aims" type="button" role="tab" aria-controls="course-aims"
                                aria-selected="false">
                                <span>Course Aims</span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="learning-objectives-tab" data-toggle="tab"
                                data-target="#learning-objectives" type="button" role="tab"
                                aria-controls="learning-objectives" aria-selected="false">
                                <span>Learning Objectives</span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                            <button class="p-2 btn border btn-info" id="learning-outcomes-tab" data-toggle="tab"
                                data-target="#learning-outcomes" type="button" role="tab"
                                aria-controls="learning-outcomes" aria-selected="false">
                                <span>Learning Outcomes</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content tab-content-responsive border mx-1 rounded py-3 my-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="pl-2 bg-light"><strong>Mock Content</strong></div>
                            <hr>
                            @foreach ($mockContent as $content)
                                <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                    <p class="mb-0">{{ $content['attributes']['content'] }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="tab-pane fade" id="course-for" role="tabpanel" aria-labelledby="course-for-tab">
                            <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                <div class="pl-2 bg-light"><strong>Who Is The Course For</strong></div>
                                <hr>
                                @foreach ($mockWhoIsTheCourseFor as $content)
                                    <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                        <p class="mb-0">{{ $content['attributes']['audience'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="course-aims" role="tabpanel" aria-labelledby="course-aims-tab">
                            <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                <div class="pl-2 bg-light"><strong>Course Aims</strong></div>
                                <hr>
                                @foreach ($mockCourseAims as $content)
                                    <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                        <p class="mb-0">{{ $content['attributes']['aims'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="learning-objectives" role="tabpanel"
                            aria-labelledby="learning-objectives-tab">
                            <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                <div class="pl-2 bg-light"><strong>Learning Objectives</strong></div>
                                <hr>
                                @foreach ($mockLearningObjectives as $content)
                                    <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                        <p class="mb-0">{{ $content['attributes']['objective'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="learning-outcomes" role="tabpanel"
                            aria-labelledby="learning-outcomes-tab">
                            <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                <div class="pl-2 bg-light"><strong>Learning Outcomes</strong></div>
                                <hr>
                                @foreach ($mockLearningOutcomes as $content)
                                
                                    <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                        <p class="mb-0">{{ $content['attributes']['outcome'] }}</p>
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
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ $mockExam->id }}">
                                <img src="{{ asset('storage/' . $mockExam->image) }}"
                                    class="card-img-top card-top img-fluid" alt="{{ $mockExam->name }}" />
                            </a>
                            <h4 class="card-info">{{ $mockExam->name }}</h4>
                            <a href="{{ $mockExam->image }}" data-lightbox="roadtrip"
                                data-title="{{ $mockExam->name }}">
                                <div class="layout">&nbsp;</div>
                            </a>
                            <div class="card-body border p-3 mb-2 rounded">
                                <h5 class="card-title">
                                    {{ implode(', ', $mockExam->tutors->pluck('name')->toArray()) }}
                                </h5>
                                <p>number of attendees
                                    <strong>{{ \App\Services\BookingService::getAttendeesNumberInMockExam($mockExam->id) }}
                                        people</strong>
                                </p>
                                {{-- <p>number of hours <strong>20h</strong></p> --}}
                                <a href="{{ route('mock-exams.book-mock', $mockExam->id) }}"
                                    class="btn btn-join float-right">Find Your Tutors avaiable</a>
                                <span>{{ $mockExam->price }} $ </span>

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
