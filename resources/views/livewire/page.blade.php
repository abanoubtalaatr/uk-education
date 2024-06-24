<div>
  <div>
    @section('content')
        @include('partials.nav-header')
        <main>
            <!-- start about -->
            <div class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-head">
                                <h3>{{ $page->name ?? '' }}</h3>
  
                            </div>
                        </div>
                        @if (isset($page->slug) && $page->slug == 'about-us')
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="skill text-center">
                                            <img src="{{ asset('assets/images/school.png') }}" alt=""
                                                class="img-fluid">
                                            <h6>Over +500 Courses</h6>
                                            <p>
                                                Sed ut perspiciatis unde omnis istpoe natus error sit
                                                voluptatem accusantium doloremque eopsloi laudantium
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="skill text-center">
                                            <img src="{{ asset('assets/images/teacher.png') }}" alt=""
                                                class="img-fluid">
                                            <h6>Over +500 Courses</h6>
                                            <p>
                                                Sed ut perspiciatis unde omnis istpoe natus error sit
                                                voluptatem accusantium doloremque eopsloi laudantium
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="skill text-center">
                                            <img src="{{ asset('assets/images/shopping-center.png') }}" alt=""
                                                class="img-fluid">
                                            <h6>Over +500 Courses</h6>
                                            <p>
                                                Sed ut perspiciatis unde omnis istpoe natus error sit
                                                voluptatem accusantium doloremque eopsloi laudantium
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12 ">
                            <div class="row">
  
                                <div class="col-md-12">
                                    <div class="">
                                        {!! $page->content ?? '' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <h3>Our Tutors</h3>
                          <div class="row d-flex">
                              @foreach ($tutors as $tutor)
                                  <div class="col-md-3 border-right border-bottom mb-3  tutor-card">
                                      <a href="{{ route('tutors.details', $tutor->id) }}" class="mx-2 text-decoration-none">
                                          <img height="100" src="{{ asset('storage').'/'.$tutor->photo }}" alt="Tutor Image" class="img-fluid pro-image" />
                                          <p class="mt-3 pro-name">{{ $tutor->name }}</p>
                                          <p class="mt-3 pro-name tutor-about">{{ Str::limit($tutor->about, 100) }}</p>
                                      </a>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                      
  
                    </div>
                </div>
            </div>
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
</div>
