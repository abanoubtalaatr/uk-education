<!-- start Navbar -->
<div>
    <section class="hero">
        <div class="header-1">
            <div class="container-fluid y-side">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="header-1-list list-1">
                            <li>
                                <a href="#">{{ $settings['mobile'] }}</a>
                            </li>
                            <li class="sperator">|</li>

                            <li>
                                <a href="#">{{ $settings['email'] }}</a>
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
                <a target="_blank" href="{{ 'https://wa.me/' . $settings['whats_app_number'] }}">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ $settings['facebook'] }}">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ $settings['twitter'] }}">
                    <i class="fab fa-twitter"></i>
                </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ $settings['instagram'] }}">
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
                                Over 700+ Scenario Examples
                                Benefit from over 700 scenario examples that follow the latest UKMLA content map and
                                guidelines, ensuring you are up-to-date with current standards.
                                Expert Tutors
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/school.png" alt="" class="img-fluid" />
                                    <h3>Extensive Study material  </h3>
                                    <p>
                                        Over 700+ Scenario Examples that covers different aspects of the exam.
                                        Benefit from over 700 scenario examples that follow the latest UKMLA content map
                                        and guidelines, ensuring you are up-to-date with current standards.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/teacher.png" alt="" class="img-fluid" />
                                    <h3>Learn from the BEST </h3>
                                    <p>
                                        Dr. Radwan and a team of experienced medical professionals will provide expert guidance and insights into the PLAB and UKMLA exam and starting your NHS career.
                                    </p>
                                    <p>Dr. Radwan has proudly helped many current NHS doctors to successfully ACE their PLAB/UKMLA exam ensuring you get the best possible preparation.</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/teacher.png" alt="" class="img-fluid" />
                                    <h3>Flexible Learning</h3>
                                    <p>
                                        Enjoy the convenience of flexible study times and cost-effective options tailored to fit your schedule and budget. Whether you have demanding hospital shifts, are busy with motherhood, or both, our flexible learning ensures you get the highest preparation standards. Even if you can't afford expensive academies, you can access top-quality preparation without paying an arm and a leg.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="skill text-center">
                                    <img src="assets/images/shopping-center.png" alt="" class="img-fluid" />
                                    <h3>Free Support After PLAB 2</h3>
                                    <p>
                                        Get the advice you need to secure your GMC registration, Clinical Attachment, and First NHS job. Our support continues even after you've passed the PLAB/UKMLA exam, at no extra cost.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="skill text-center">
                                    <img src="assets/images/shopping-center.png" alt="" class="img-fluid" />
                                    <h3>Proven Success</h3>
                                    <p>
                                        Join the ranks of our successful candidates who have aced their PLAB/UKMLA exam with our comprehensive and targeted preparation strategies. We proudly maintain a 100% track record of candidates who successfully cleared their PLAB 2 exam on the first attempt so far.
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
            document.querySelectorAll(".star-icon").forEach(function(star) {
                star.addEventListener("click", function() {
                    this.classList.toggle("clicked");
                });
            });

            document
                .getElementById("mainButton")
                .addEventListener("click", function() {
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
