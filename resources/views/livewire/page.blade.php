<div>
  <div>
    @section('content')
        @include('partials.nav-header')
        <main>
            <!-- start about -->
            <div class="about p-0">
                <div class="container-fluid y-side">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-head">
                                <!--<h3>{{ $page->name ?? '' }}</h3>-->
                                                                <!--<h3>Our Story</h3>-->

  
                            </div>
                        </div>
                        @if (isset($page->slug) && $page->slug == 'about-us')
                            <!--<div class="col-md-12 mb-4">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-4">-->
                            <!--            <div class="skill text-center">-->
                            <!--                <img src="{{ asset('assets/images/school.png') }}" alt=""-->
                            <!--                    class="img-fluid">-->
                            <!--                <h6>Over +500 Courses</h6>-->
                            <!--                <p>-->
                            <!--                    Sed ut perspiciatis unde omnis istpoe natus error sit-->
                            <!--                    voluptatem accusantium doloremque eopsloi laudantium-->
                            <!--                </p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-4">-->
                            <!--            <div class="skill text-center">-->
                            <!--                <img src="{{ asset('assets/images/teacher.png') }}" alt=""-->
                            <!--                    class="img-fluid">-->
                            <!--                <h6>Over +500 Courses</h6>-->
                            <!--                <p>-->
                            <!--                    Sed ut perspiciatis unde omnis istpoe natus error sit-->
                            <!--                    voluptatem accusantium doloremque eopsloi laudantium-->
                            <!--                </p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-4">-->
                            <!--            <div class="skill text-center">-->
                            <!--                <img src="{{ asset('assets/images/shopping-center.png') }}" alt=""-->
                            <!--                    class="img-fluid">-->
                            <!--                <h6>Over +500 Courses</h6>-->
                            <!--                <p>-->
                            <!--                    Sed ut perspiciatis unde omnis istpoe natus error sit-->
                            <!--                    voluptatem accusantium doloremque eopsloi laudantium-->
                            <!--                </p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                        @endif
                        <!--<div class="col-md-12 ">-->
                        <!--    <div class="row">-->
  
                        <!--        <div class="col-md-12">-->
                        <!--            <div class="">-->
                        <!--                {!! $page->content ?? '' !!}-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-md-12">
                          <!--<h3>Our Tutors</h3>-->
                          <div class="row d-flex">
                              @foreach ($tutors as $tutor)
                                  <!--<div class="col-md-3 border-right border-bottom mb-3  tutor-card">-->
                                  <!--    <a href="{{ route('tutors.details', $tutor->id) }}" class="mx-2 text-decoration-none">-->
                                  <!--        <img height="100" src="{{ asset('storage').'/'.$tutor->photo }}" alt="Tutor Image" class="img-fluid pro-image" />-->
                                  <!--        <p class="mt-3 pro-name">{{ $tutor->name }}</p>-->
                                  <!--        <p class="mt-3 pro-name tutor-about">{{ Str::limit($tutor->about, 100) }}</p>-->
                                  <!--    </a>-->

                                      
                                  <!--</div>-->
                              @endforeach
                          </div>
                      </div>
                      
  
                    </div>
                </div>
            </div>
              <div class="why-us pb-5 pt-0">
            <div class="container-fluid y-side">
                <div class=' mb-5 banner_story'>
                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                    <div class="head-coach text-center">
                            <h3>Our Story</h3>
                           
                        </div>
                    </div>
                                                                  <div class="col-md-7 ">
                                   <div class="head-coach text-start">
                            <h3>WELCOME TO ARS</h3>
                            <p>
                                Conquer All 16, Score A Perfect 12 with our Extended Revision Program, Mocks, Perfect Simulations & a Condensed Crash Course. We Offer:
                            </p>
                           
                        </div>
                        <ul style='list-style: disc;'>
                            <li class='mb-3'>Live & Recorded Sessions Breaking Down Each Chapter for Effective Management, Focused Data-Gathering, & Impressive IPS Delivery.</li>
                            <li class='mb-3'>Access To Up To Date & Concise Notes Highlighting Key Points, Types of Referrals & Management Strategies With Answers to All Concerns.</li>
                          <li class='mb-3'>Guided Practice Plans Supported by Continuous Follow up.</li>
                          <li class='mb-3'>Group Mocks Conducted Through Out the Course to Identify & Address All Weak Points.</li>
                          <li class='mb-3'>⁠Perfect Audio Simulations for All High Yield Topics.
</li>
<li class='mb-3'>A 4, 6 or 8 Stations’ Mocks with Extensive & Tailored Feedback.</li>
                        </ul>

                    </div>
                     <div class="col-md-5 ">
<video controls style="width: 100%; height: 300px;">
  <source src="https://videos.pexels.com/video-files/7195710/7195710-uhd_2732_1440_25fps.mp4" type="video/mp4">
  
</video>

                    </div>
  </div>
                </div>
                               
                   <div class="row mt-5">
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
         @include('partials.tutors')
            <!-- start subscrib -->
            @include('partials.footer')
        </main>
    @endsection
  </div>
  
  <style>
    .tutor-card {
        max-height: 250px; /* Adjust as necessary */
        overflow: hidden;
        position: relative;
    }
  
    .tutor-card p {
        margin: 0;
    }
  
    .tutor-about {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
  </style>
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
                <span class="read-more" style=" cursor: pointer;">Read more</span>
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
</div>
