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

    @include('partials.courses')

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

        @include('partials.tutors')

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
