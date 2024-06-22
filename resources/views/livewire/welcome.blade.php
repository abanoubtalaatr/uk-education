<!-- start Navbar -->
<div>
    <section class="hero">
        <div class="header-1">
            <div class="container-fluid y-side">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="header-1-list list-1">
                            <li>
                                <a href="#">{{$settings['mobile']}}</a>
                            </li>
                            <li class="sperator">|</li>

                            <li>
                                <a href="#">{{$settings['email']}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.navbar')
        @include('partials.slider')
        @include('partials.search')
    </section>

    <!--  -->

    <div class="container-social social-media-index">
        <button id="mainButton" class="btn main-btn-social">Follow us</button>
        <div id="hiddenButtons" class="hidden">
            <button class="btn">
                <a target="_blank" href="{{ $settings['linkedin'] }}">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ 'https://wa.me/' .  $settings['whats_app_number']}}">
                    <i class="fab fa-whatsapp"></i>
                  </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ $settings['facebook']}}">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ $settings['twitter'] }}">
                    <i class="fab fa-twitter"></i>
                </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ $settings['instagram']}}">
                    <i class="fab fa-instagram"></i>
                </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ $settings['youtube'] }}">
                    <i class="fab fa-youtube"></i>
                </a>
            </button>
        </div>
        
    </div>

    <div class="top-coaches">
        <div class="container-fluid y-side">
            <div class="head-coach ml-4">
                <h3>Newly Added Courses</h3>
            </div>
        </div>
        <div class="container-fluid y-side">
            <div class="responsive">
                @foreach ($courses as $course)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ route('courses.show', $course->id) }}">
                                <img src="{{ asset('storage/' . $course->image) }}"
                                    class="card-img-top card-top img-fluid" alt="{{ $course->name }}" />
                            </a>
                            <h4 class="card-info">{{ $course->name }}</h4>
                            <a href="{{ asset('storage/' . $course->image) }}" data-lightbox="roadtrip"
                                data-title="{{ $course->name }}">
                                <div class="layout">&nbsp;</div>
                            </a>
                            <div class="card-body border p-3 mb-2 rounded">
                                <h5 class="card-title">
                                    {{ implode(', ', $course->tutors->pluck('name')->toArray()) }}
                                </h5>
                                <p>number of attendees
                                    <strong>{{ \App\Services\BookingService::getAttendeesNumberInCourse($course->id) }}
                                        people</strong></p>

                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-join float-right">Book
                                    Now</a>
                                <span>{{ $course->price }} $</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!--  -->

    <main>
        <div class="why-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head text-center">
                            <h3>Why Choose Us</h3>
                            <p>
                                Sed ut perspiciatis unde omnis istpoe natus error sit
                                voluptatem accusantium doloremque eopsloi laudantium
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/school.png" alt="" class="img-fluid" />
                                    <h6>Over +500 Courses</h6>
                                    <p>
                                        Sed ut perspiciatis unde omnis istpoe natus error sit
                                        voluptatem accusantium doloremque eopsloi laudantium
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/teacher.png" alt="" class="img-fluid" />
                                    <h6>Best Tutors</h6>
                                    <p>
                                        Sed ut perspiciatis unde omnis istpoe natus error sit
                                        voluptatem accusantium doloremque eopsloi laudantium
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/shopping-center.png" alt="" class="img-fluid" />
                                    <h6>Over +500 Courses</h6>
                                    <p>
                                        Sed ut perspiciatis unde omnis istpoe natus error sit
                                        voluptatem accusantium doloremque eopsloi laudantium
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.testimonials')

        <div class="top-coaches new-bg-top-couch">
            <div class="container-fluid y-side">
                <div class="head-coach ml-4">
                    <h3>Our Top Tutors</h3>
                </div>
            </div>
            <div class="container-fluid y-side">
                <div class="responsive">
                    @foreach ($tutors as $tutor)
                        <div class="coach-profile">
                            <img src="{{ asset('storage/' . $tutor->photo) }}" alt="" class="img-fluid" />
                            <a href="{{ route('tutors.details', $tutor->id) }}">
                                <h5 class="c-name">{{ $tutor->name }}</h5>
                            </a>
                            <h6>{{ Str::limit($tutor->about, 20, '...') }}</h6>
                            <div class="coach-layout">&nbsp;</div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- start download section -->
        <div class="download">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="down-info">
                            <h4>Free Download Now</h4>
                            <p>
                                Sed ut perspiciatis unde omnis istpoe natus error sit
                                voluptatem accusantium doloremque eopsloi laudantium Sed ut
                                perspiciatis unde omnis istpoe natus error sit voluptatem
                                accusantium doloremque eopsloi laudantium
                            </p>
                            <ul class="down-badg">
                                <li>
                                    <img src="assets/images/badge-play.png" alt="" />
                                </li>
                                <li><img src="assets/images/badge-store.png" alt="" /></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="project">
                            <img src="assets/images/download.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
        <script>
            document.querySelectorAll(".star-icon").forEach(function (star) {
              star.addEventListener("click", function () {
                this.classList.toggle("clicked");
              });
            });
      
            document
              .getElementById("mainButton")
              .addEventListener("click", function () {
                const hiddenButtons = document.getElementById("hiddenButtons");
                if (hiddenButtons.classList.contains("hidden")) {
                  hiddenButtons.classList.remove("hidden");
                  hiddenButtons.classList.add("visible");
                } else {
                  hiddenButtons.classList.remove("visible");
                  hiddenButtons.classList.add("hidden");
                }
              });
          </script>
    </main>

</div>
