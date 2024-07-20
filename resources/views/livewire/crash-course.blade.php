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
                    <p>
                        {{-- {!! \Outl1ne\NovaSettings\NovaSettings::getSetting('crash_description') !!} --}}
                    </p>
                    <h3>All Crash Courses</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs border-bottom-0" id="myTab" role="tablist">
                        <li class="m-1 mobile-taps-responsive mb-1" role="presentation">
                            <button class="p-2 btn border btn-info" id="home-tab" data-toggle="tab" data-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <span>PLAB2/CPSA Course </span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-1" role="presentation">
                            <button class="p-2 btn border btn-info" id="course-content-tab" data-toggle="tab"
                                data-target="#course-content" type="button" role="tab"
                                aria-controls="course-content" aria-selected="false">
                                <span>Course content </span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-1" role="presentation">
                            <button class="p-2 btn border btn-info" id="course-for-tab" data-toggle="tab"
                                data-target="#course-for" type="button" role="tab" aria-controls="course-for"
                                aria-selected="false">
                                <span>Who the course is for </span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-1" role="presentation">
                            <button class="p-2 btn border btn-info" id="course-aims-tab" data-toggle="tab"
                                data-target="#course-aims" type="button" role="tab" aria-controls="course-aims"
                                aria-selected="false">
                                <span>Course aims </span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-1" role="presentation">
                            <button class="p-2 btn border btn-info" id="learning-objectives-tab" data-toggle="tab"
                                data-target="#learning-objectives" type="button" role="tab"
                                aria-controls="learning-objectives" aria-selected="false">
                                <span>Learning objectives </span>
                            </button>
                        </li>
                        <li class="m-1 mobile-taps-responsive mb-1" role="presentation">
                            <button class="p-2 btn border btn-info" id="learning-outcomes-tab" data-toggle="tab"
                                data-target="#learning-outcomes" type="button" role="tab"
                                aria-controls="learning-outcomes" aria-selected="false">
                                <span>Learning outcomes </span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content tab-content-responsive border mx-1 rounded py-3 my-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            @foreach ($plabCourse as $content)
                                <div class="p-3 mb-1 bg-light rounded border-bottom ">
                                    <p class="mb-0">{{ $content['attributes']['plab2_crash_course'] }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="course-content" role="tabpanel"
                            aria-labelledby="course-content-tab">
                            <div class="p-3 mb-1 bg-light rounded border-bottom">
                                @foreach ($courseContent as $content)
                                    <div class="p-3 mb-1 bg-light rounded ">
                                        <p class="mb-0">{{ $content['attributes']['crash_course_content'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="course-for" role="tabpanel" aria-labelledby="course-for-tab">
                            <div class="p-3 mb-1 bg-light rounded border-bottom">
                                @foreach ($whoTheCourseFor as $content)
                                    <div class="p-3 mb-1 bg-light rounded ">
                                        <p class="mb-0">{{ $content['attributes']['who_the_crash_course_for'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="course-aims" role="tabpanel" aria-labelledby="course-aims-tab">
                            <div class="p-3 mb-1 bg-light rounded border-bottom">
                                @foreach ($courseAims as $content)
                                    <div class="p-3 mb-1 bg-light rounded ">
                                        <p class="mb-0">{{ $content['attributes']['crash_course_aim'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="learning-objectives" role="tabpanel"
                            aria-labelledby="learning-objectives-tab">
                            <div class="p-3 mb-1 bg-light rounded border-bottom">
                                @foreach ($courseLearningObjectives as $content)
                                    <div class="p-3 mb-1 bg-light rounded ">
                                        <p class="mb-0">{{ $content['attributes']['crash_course_learning_objectives'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="learning-outcomes" role="tabpanel"
                            aria-labelledby="learning-outcomes-tab">
                            <div class="p-3 mb-1 bg-light rounded border-bottom">
                                @foreach ($courseLearningOutcomes as $content)
                                    <div class="p-3 mb-1 bg-light rounded ">
                                        <p class="mb-0">{{ $content['attributes']['crash_course_learning_outcomes'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
