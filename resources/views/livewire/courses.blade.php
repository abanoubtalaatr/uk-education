<div>
    <main>
        @include('partials.nav-header')
        <!-- start add course -->
        <div class="add-2">
            <div class="container">
                <div class="row">
                    <div class="head-path">
                        <ul class="path-menu">
                            <li><a href="/">Home ></a></li>
                            <li><a href="#">Courses</a></li>
                        </ul>
                        <p>
                            {{-- {!! \Outl1ne\NovaSettings\NovaSettings::getSetting('course_description') !!} --}}
                        </p>
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
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                @foreach ($plabCourse as $content)
                                    <div class="p-3 mb-1 bg-light rounded border-bottom">
                                        <p class="mb-0">{{ $content['attributes']['plab2_course'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="course-content" role="tabpanel"
                                aria-labelledby="course-content-tab">
                                <div class="p-3 mb-1 bg-light rounded border-bottom">
                                    @foreach ($courseContent as $content)
                                        <div class="p-3 mb-1 bg-light rounded">
                                            <p class="mb-0">{{ $content['attributes']['course_content'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="course-for" role="tabpanel" aria-labelledby="course-for-tab">
                                <div class="p-3 mb-1 bg-light rounded border-bottom">
                                    @foreach ($whoTheCourseFor as $content)
                                        <div class="p-3 mb-1 bg-light rounded">
                                            <p class="mb-0">{{ $content['attributes']['who_the_course_for'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="course-aims" role="tabpanel" aria-labelledby="course-aims-tab">
                                <div class="p-3 mb-1 bg-light rounded border-bottom">
                                    @foreach ($courseAims as $content)
                                        <div class="p-3 mb-1 bg-light rounded">
                                            <p class="mb-0">{{ $content['attributes']['course_aims'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="learning-objectives" role="tabpanel"
                                aria-labelledby="learning-objectives-tab">
                                <div class="p-3 mb-1 bg-light rounded border-bottom">
                                    @foreach ($courseLearningObjectives as $content)
                                        <div class="p-3 mb-1 bg-light rounded">
                                            <p class="mb-0">{{ $content['attributes']['learning_objectives'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="learning-outcomes" role="tabpanel"
                                aria-labelledby="learning-outcomes-tab">
                                <div class="p-3 mb-1 bg-light rounded border-bottom">
                                    @foreach ($courseLearningOutcomes as $content)
                                        <div class="p-3 mb-1 bg-light rounded">
                                            <p class="mb-0">{{ $content['attributes']['learning_outcomes'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="mb-5">All Courses</h3>
                <div class="row mb-3">
                    @foreach ($courses as $course)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <a href="{{ route('courses.show', $course->id) }}">
                                    <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top img-fluid"
                                        alt="{{ $course->name }}" />
                                </a>
                                <div class="card-info">{{ $course->name }}</div>
                                <div class="card-body p-3 mb-1 rounded">
                                    <h5 class="card-title">
                                        {{ implode(', ', $course->tutors->pluck('name')->toArray()) }}
                                    </h5>
                                    
                                    <a href="{{ route('courses.show', $course->id) }}"
                                        class="btn btn-join float-right">Booking Now</a>
                                    <span class="float-right mr-2">{{ $course->price }} £</span>
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .path-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            font-size: 1rem;
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

        .nav-tabs .nav-link {
            border-radius: 0;
            border: none;
            background-color: #e9ecef;
            color: #495057;
            transition: background-color 0.3s;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .card {
            border: none;
            display: flex;
            flex-direction: column;
            height: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-bottom: 1px solid #e9ecef;
            transition: transform 0.3s;
        }

        .card-img-top:hover {
            transform: scale(1.05);
        }

        .card-info {
            font-size: 1.25rem;
            color: #333;
            padding: 15px;
            background-color: #f8f9fa;
            text-align: center;
        }

        .card-body {
            background-color: #fff;
            flex-grow: 1;
        }

        .card-body h5 {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 10px;
        }

        .card-body p {
            color: #666;
        }

        .btn-join {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 0.9rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-join:hover {
            background-color: #0056b3;
        }

        .layout {
            display: block;
            width: 100%;
            height: 10px;
            background-color: #007bff;
        }

        .tab-content {
            margin-top: 20px;
        }

        .tab-pane {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 5px;
        }

        .tab-pane p {
            margin: 0;
            color: #333;
        }

        .btn-book-now {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-book-now:hover {
            background-color: #218838;
        }
    </style>
</div>