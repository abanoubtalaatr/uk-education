<div>
    @include('partials.nav-header')
    <main>
        <!-- start add cours -->
        <div class="add-2">
            <div class="container-fluid y-side">
                <div class="row">
                    <div class="col-md-12">
                        <div class="head-path ml-none">
                            <ul class="path-menu">
                                <li><a href="#">Home ></a></li>
                                <li><a href="#">Tutors > </a></li>

                                <li><a href="#">Tutor > {{ $tutor->name }} </a></li>
                            </ul>
                            <h3>Tutor Profile</h3>
                        </div>
                    </div>
                    <div class="col-md-12 top-med">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="info-box text-center">
                                    <img src="{{ asset('storage/' . $tutor->photo) }}" alt=""
                                        class="img-fluid" />
                                    <strong>{{ $tutor->name }}</strong>

                                    <p class="text-wrap" style="max-height: 150px">
                                        {{ $tutor->about }}
                                    </p>
                                </div>
                            </div>
                            @if (count($courses) > 0)
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12 top-med">
                                            <div class="teaching-box left">
                                                <a href="{{ route('all-courses') }}" class="float-right">
                                                    <p>Courses</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 top-med">
                                            <div class="row">
                                                @foreach ($courses as $course)
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <a href="{{ route('courses.show', $course->id) }}">
                                                                <img src="{{ asset('storage/' . $course->image) }}"
                                                                    class="card-img-top card-top img-fluid"
                                                                    alt="..." />
                                                            </a>

                                                            <h4 class="card-info">{{ $course->name }}</h4>
                                                            <a href="{{ asset('storage/' . $course->image) }}"
                                                                data-lightbox="roadtrip" data-title="My caption">
                                                                <div class="layout">&nbsp;</div>
                                                            </a>
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    {{ $tutor->name }}

                                                                </h5>

                                                                <a href="{{ route('courses.show', $course->id) }}"
                                                                    class="btn btn-join float-right">Booking Now
                                                                </a>
                                                                <span>{{ $course->price }} $</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif


                        </div>
                        @if (count($mockExams) > 0)

                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12 top-med">
                                            <div class=" left">
                                                <a href="{{ route('all-mock-exams') }}" class="float-right">
                                                    <p>Mock exams</p>
                                                </a>


                                            </div>
                                        </div>
                                        <div class="col-md-12 top-med">
                                            <div class="row">
                                                @foreach ($mockExams as $mockExam)
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <a href="{{ route('mock-exams.show', $mockExam->id) }}">
                                                                <img src="{{ asset('storage/' . $mockExam->image) }}"
                                                                    class="card-img-top card-top img-fluid"
                                                                    alt="..." />
                                                            </a>

                                                            <h4 class="card-info">{{ $mockExam->name }}</h4>
                                                            <a href="{{ asset('storage/' . $mockExam->image) }}"
                                                                data-lightbox="roadtrip" data-title="My caption">
                                                                <div class="layout">&nbsp;</div>
                                                            </a>
                                                            <div class="card-body p-2">
                                                                <h5 class="card-title">
                                                                    {{ $tutor->name }}

                                                                </h5>

                                                                <a href="{{ route('mock-exams.show', $mockExam->id) }}"
                                                                    class="btn btn-join float-right">Booking Now
                                                                </a>
                                                                <span>{{ $mockExam->price }} $</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        @endif
                        @if (count($crashCourses) > 0)
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12 top-med">
                                            <div class="teaching-box left">
                                                <a href="{{ route('all-crash-courses') }}" class="float-right">
                                                    <p>Crash Coures</p>
                                                </a>


                                            </div>
                                        </div>
                                        <div class="col-md-12 top-med">
                                            <div class="row">
                                                @foreach ($crashCourses as $crashCoure)
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <a
                                                                href="{{ route('crash-courses.show', $crashCoure->id) }}">
                                                                <img src="{{ asset('storage/' . $crashCoure->image) }}"
                                                                    class="card-img-top card-top img-fluid"
                                                                    alt="..." />
                                                            </a>

                                                            <h4 class="card-info">{{ $crashCoure->name }}</h4>
                                                            <a href="{{ asset('storage/' . $crashCoure->image) }}"
                                                                data-lightbox="roadtrip" data-title="My caption">
                                                                <div class="layout">&nbsp;</div>
                                                            </a>
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    {{ $tutor->name }}

                                                                </h5>

                                                                <a href="{{ route('crash-courses.show', $crashCoure->id) }}"
                                                                    class="btn btn-join float-right">Booking Now
                                                                </a>
                                                                <span>{{ $crashCoure->price }} $</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-12 top-med">
                                            <div class="teaching-box left">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (count($subscriptions) > 0)
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12 top-med">
                                            <div class="teaching-box left">
                                                <a href="{{ route('all-subscriptions') }}" class="float-right">
                                                    <p>Subscriptions</p>
                                                </a>


                                            </div>
                                        </div>
                                        <div class="col-md-12 top-med">
                                            <div class="row">
                                                @foreach ($subscriptions as $subscription)
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <a
                                                                href="{{ route('subscriptions.show', $subscription->id) }}">
                                                                <img src="{{ asset('storage/' . $subscription->image) }}"
                                                                    class="card-img-top card-top img-fluid"
                                                                    alt="..." />
                                                            </a>

                                                            <h4 class="card-info">{{ $subscription->name }}</h4>
                                                            <a href="{{ asset('storage/' . $subscription->image) }}"
                                                                data-lightbox="roadtrip" data-title="My caption">
                                                                <div class="layout">&nbsp;</div>
                                                            </a>
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    {{ $tutor->name }}

                                                                </h5>

                                                                <a href="{{ route('subscriptions.show', $subscription->id) }}"
                                                                    class="btn btn-join float-right">Booking Now
                                                                </a>
                                                                <span>{{ $subscription->price }} $</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-12 top-med">
                                            <div class="teaching-box left">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </main>
</div>
