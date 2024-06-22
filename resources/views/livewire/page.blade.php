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
                  <h3>{{$page->name??""}}</h3>
                  
                </div>
              </div>
              @if (isset($page->slug) && $page->slug == 'about-us')
              <div class="col-md-12 mb-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="skill text-center">
                      <img src="{{asset('assets/images/school.png')}}" alt="" class="img-fluid">
                      <h6>Over +500 Courses</h6>
                      <p>
                        Sed ut perspiciatis unde omnis istpoe natus error sit
                        voluptatem accusantium doloremque eopsloi laudantium
                      </p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="skill text-center">
                      <img src="{{asset('assets/images/teacher.png')}}" alt="" class="img-fluid">
                      <h6>Over +500 Courses</h6>
                      <p>
                        Sed ut perspiciatis unde omnis istpoe natus error sit
                        voluptatem accusantium doloremque eopsloi laudantium
                      </p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="skill text-center">
                      <img src="{{asset('assets/images/shopping-center.png')}}" alt="" class="img-fluid">
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
                      {!! $page->content??"" !!}
                    </div>
                  </div>
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