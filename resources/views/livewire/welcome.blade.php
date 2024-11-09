<!-- start Navbar -->
<div>
    @php
    use Outl1ne\NovaSettings\NovaSettings;
@endphp
    <section class="hero">
        <div class="header-1">
            <div class="container-fluid y-side">
                <div class="row mb-4">
                        <div class="col-md-6">
                                                                                               <a href="/">
                <img width="150" src="{{ asset('storage/' . NovaSettings::getSetting('logo')) }}" alt="Logo">
            </a>
                    </div>
                    <div class="col-md-6">
                        <ul class="header-1-list list-1">
                            <li>
                                <a href="#">{{ $settings['mobile'] }}</a>
                            </li>
                            <li class="sperator">|</li>

                            <li>
                                <a href="#">{{ $settings['email'] }} 000</a>
                            </li>
                        </ul>
                    </div>
                 
      
                </div>
            </div>
        </div>
        @include('partials.navbar')
        @include('partials.slider')

    </section>
        @include('partials.search')

    <!--  -->

    <div class="container-social social-media-index">
        <button id="mainButton" class="btn main-btn-social">Follow us</button>
        <div id="hiddenButtons" class="hidden">
            <button class="btn">
                <a target="_blank" href="{{ $settings['instagram'] }}">
                    <i class="fab fa-instagram"></i>
                </a>
            </button>
            
            
            <button class="btn">
                <a target="_blank" href="{{ 'https://wa.me/' . $settings['whats_app_number_group'] }}">
                    
                    <i class="fab fa-whatsapp-square"></i>
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
            {{-- <button class="btn">
                <a target="_blank" href="{{ $settings['twitter'] }}">
                    <i class="fab fa-twitter"></i>
                </a>
            </button> --}}
            
            <button class="btn">
                <a target="_blank" href="{{ $settings['youtube'] }}">
                    <i class="fab fa-youtube"></i>
                </a>
            </button>
            <button class="btn">
                <a target="_blank" href="{{ $settings['linkedin'] }}">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </button>
        </div>

    </div>

    @include('partials.courses')

    <!--  -->

    <main>
        <div class="why-us pt-0">
            <div class="container-fluid y-side">
                   <div class="row">
                             <div class="col-md-12">
                                    <div class="head-coach text-center">
                            <h3>Why Choose Us</h3>
                           
                        </div>
                    </div>
                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/i1.png" alt="" class="img-fluid" />
                                    <h3>Extensive Study material  </h3>
                                    <div class="small-font">
                                        Over 700+ Scenario Examples that covers different aspects of the exam.
                                        Benefit from over 700 scenario examples that follow the latest UKMLA content map
                                        and guidelines, ensuring you are up-to-date with current standards.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/i2.png" alt="" class="img-fluid" />
                                    <h3>Learn from the BEST </h3>
                                    <div class="small-font">
                                        Dr. Radwan and a team of experienced medical professionals will provide expert guidance and insights into the PLAB and UKMLA exam and starting your NHS career.
                                        <br/>
                                       Dr. Radwan has proudly helped many current NHS doctors to successfully ACE their PLAB/UKMLA exam ensuring you get the best possible preparation.

                                    </div>
                             
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/i3.png" alt="" class="img-fluid" />
                                    <h3>Flexible Learning</h3>
                                    <div class="small-font">
                                        Enjoy the convenience of flexible study times and cost-effective options tailored to fit your schedule and budget. Whether you have demanding hospital shifts, are busy with motherhood, or both, our flexible learning ensures you get the highest preparation standards. Even if you can't afford expensive academies, you can access top-quality preparation without paying an arm and a leg.
                                    </div>
                                </div>
                            </div>

                        </div>
                                  <div class="row mt-5 justify-content-center">

      <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/i4.png" alt="" class="img-fluid" />
                                    <h3>Free Support After PLAB 2</h3>
                                    <div class="small-font">
                                        Get the advice you need to secure your GMC registration, Clinical Attachment, and First NHS job. Our support continues even after you've passed the PLAB/UKMLA exam, at no extra cost.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="skill text-center">
                                    <img src="assets/images/i5.png" alt="" class="img-fluid" />
                                    <h3>Proven Success</h3>
                                    <div class="small-font small-font">
                                        Join the ranks of our successful candidates who have aced their PLAB/UKMLA exam with our comprehensive and targeted preparation strategies. We proudly maintain a 100% track record of candidates who successfully cleared their PLAB 2 exam on the first attempt so far.
                                    </div>
                                </div>
                            </div>
                        </div>
          
            </div>
        </div>
        @include('partials.testimonials')

        @include('partials.tutors')

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
    <style>
        .small-font{
            font-size: 15px;
        }
        .text-class{
            font-size:10px;
        }
    </style>

</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const maxWords = 20;

    document.querySelectorAll('.small-font').forEach(div => {
        const originalText = div.textContent.trim();
        const words = originalText.split(' ');

        if (words.length > maxWords) {
            const displayedText = words.slice(0, maxWords).join(' ');
            const hiddenText = words.slice(maxWords).join(' ');

            div.innerHTML = `
                ${displayedText}...
                <span class="read-more" style="color: blue; cursor: pointer;">Read more</span>
                <span class="more-text" style="display:none;">${hiddenText}</span>
            `;

            div.querySelector('.read-more').addEventListener('click', function() {
                const moreText = this.nextElementSibling;
                moreText.style.display = 'inline';
                this.style.display = 'none';
            });
        }
    });
});
</script>
