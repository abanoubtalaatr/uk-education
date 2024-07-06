<div>
    @include('partials.nav-header')
    <main>

        <!-- start add course -->
        <div class="add-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="head-path ml-none">
                            <ul class="path-menu">
                                <li><a href="#">Home ></a></li>
                                <li><a href="#">Mock ></a></li>
                                <li><a href="#">{{ $mockExam->name }}</a></li>
                            </ul>
                            <h3 class="mt-4">{{ $mockExam->name }}</h3>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex ">
                        <div class="col-md-6 d-flex flex-column pl-0 ml-0">
                            <div class="course-header flex-grow-1">
                                <img src="{{ asset('storage/' . $mockExam->image) }}" alt=""
                                    class="img-fluid h-100 w-100 rounded" />
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column">
                            <div class="col-md-12 flex-grow-1">
                                <div class="teaching-box left h-100 d-flex flex-column">
                                    <ul class="Calendar">
                                        <li class="text-dark">
                                            <img src="{{ asset('assets/images/Calendar.png') }}" alt=""
                                                class="img-fluid" />
                                            <span class="text-dark">{{ $mockExam->date }}</span>
                                        </li>
                                    </ul>
                                    <hr>
                                    <p class="flex-grow-1">
                                        <i class="fas fa-info-circle"></i> {{ $mockExam->description }}
                                    </p>
                                    <hr>
                                    <p class="text-dark">
                                        <i class="fas fa-dollar-sign"></i> {{ $mockExam->price }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 my-3">
                        <ul class="nav nav-tabs border-bottom-0" id="myTab" role="tablist">
                            <li class="m-1 mobile-taps-responsive mb-2" role="presentation">
                                <button class="p-2 btn border btn-info" id="home-tab" data-toggle="tab"
                                    data-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">
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
                                @foreach ($mockExam->mock_content as $content)
                                    <div class="p-3 mr-3 mb-2 bg-light rounded shadow-sm">
                                        <p class="mb-0">{{ $content['attributes']['content'] }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="course-for" role="tabpanel" aria-labelledby="course-for-tab">
                                <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                    <div class="pl-2 bg-light"><strong>Who Is The Course For</strong></div>
                                    <hr>
                                    @foreach ($mockExam->who_is_the_course_for as $content)
                                        <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                            <p class="mb-0">{{ $content['attributes']['audience'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="course-aims" role="tabpanel"
                                aria-labelledby="course-aims-tab">
                                <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                    <div class="pl-2 bg-light"><strong>Course Aims</strong></div>
                                    <hr>
                                    @foreach ($mockExam->course_aims as $content)
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
                                    @foreach ($mockExam->learning_objectives as $content)
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
                                    @foreach ($mockExam->learning_outcomes as $content)
                                        <div class="p-3 mb-2 bg-light rounded shadow-sm">
                                            <p class="mb-0">{{ $content['attributes']['outcome'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="mb-2"> Tutors</h4>

                        <div class="teaching-box left">

                            <div class="row">
                                @foreach ($tutors as $tutor)
                                    <button wire:click="selectTutor({{ $tutor->id }})"
                                        class="mx-2 border btn mb-2 @if ($tutor->id == $selectedTutor) active @endif">
                                        <img src="{{ asset('storage/' . $tutor->photo) }}" alt=""
                                            class="img-fluid pro-image rounded-circle " />
                                        <p class="mt-3 pro-name">{{ $tutor->name }}</p>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
                @if (!$mockExam->isBookedByAuthUser()->exists())
                    @if (isset($message))
                        <div class="alert alert-info mt-2">{{ $message }}</div>
                    @endif
                    <div class="row">
                        <div class="col-md-7">
                            <div class="d-flex flex-wrap">
                                @foreach ($tutors as $tutor)
                                    <button wire:click="selectTutor({{ $tutor->id }})"
                                        class="mx-2  btn mb-2 tutor-button @if ($tutor->id == $selectedTutor) active @endif">
                                        <img src="{{ asset('storage/' . $tutor->photo) }}" alt=""
                                            class="img-fluid pro-image rounded-circle " height="120" />
                                        <p class="mt-3 pro-name">{{ $tutor->name }}</p>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="d-flex flex-column justify-content-start align-items-start">
                                <div class="form-group mt-3 w-100">
                                    <label for="datePicker">Choose a Day:</label>
                                    <input type="date" id="datePicker"
                                        wire:change="getAvailableTime($event.target.value)" class="form-control">
                                </div>

                                @if ($availableTimes)
                                    <div class="row">
                                        @foreach ($availableTimes as $time)
                                            <div class="col-md-4">
                                                <button wire:click="chooseTime('{{ $time }}')"
                                                    id="{{ $time }}"
                                                    class="btn btn-join-2 mx-2 mb-3">{{ $time }}</button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="mt-3">
                                    <button wire:click="bookNow" class="btn btn-join">Book now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- start subscribe -->

        @include('partials.footer')
    </main>
    <style>
        .active {
            background: #343a4;
        }
    </style>


</div>

@push('scripts')
    <script>
        Livewire.on('dateSelected', date => {
            Livewire.emit('dateSelected', date);
        });
    </script>
@endpush
