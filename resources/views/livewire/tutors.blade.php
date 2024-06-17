<main>
    <!-- start add cours -->
@include('partials.nav-header')
    <div class="top-coaches">
      <div class="container-fluid y-side">
        <div class="head-coach ml-4">
          <ul class="path-menu">
            <li><a href="#">Home ></a></li>
            <li><a href="#">Tutors</a></li>
          </ul>
          <h3>Our Top Tutors</h3>
        </div>
      </div>
      <div class="container-fluid y-side">
        <div class="responsive">
            @foreach ($tutors as $tutor)
            <div class="coach-profile">
                <img height="300" src="{{asset('storage/'. $tutor->photo)}}" alt="" class="img-fluid" />
                <a href="{{route('tutor-profile')}}">
                  <h5 class="c-name">{{$tutor->name}}</h5>
                </a>
                <h6 class="sub-name">{{$tutor->email}}</h6>
    
                <div class="coach-layout">&nbsp;</div>
              </div>
            @endforeach
          
          
        </div>
      </div>
    </div>

    <!-- start subscrib -->
    @include('partials.footer')
  </main>