<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container-fluid y-side">
      <a href="/" class="small text-white logo">
       <img height="60" width="100" src=" {{asset('storage/'. $settings['logo'])}}" alt="Logo ">
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto navbar-nav-2">
          <li class="nav-item active">
            <a class="nav-link nav-link-2" href="/"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>

          <li class="nav-item">
            <a class="nav-link nav-link-2" href="{{route('all-courses')}}"
              >Courses</a
            >
          </li>

          <li class="nav-item">
            <a class="nav-link nav-link-2" href="{{route('all-mock-exams')}}"
              >Mock Exam</a
            >
          </li>

          <li class="nav-item">
            <a class="nav-link nav-link-2" href="{{route('all-crash-courses')}}"
              >Crash Courses</a
            >
          </li>

          <li class="nav-item">
            <a class="nav-link nav-link-2" href="{{route('all-subscriptions')}}"
              >Subscription</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-2" href="{{route('pages', 'about-us')}}">About us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link nav-link-2" href="{{route('contact-us')}}"
              >Contact us</a
            >
          </li>
        </ul>
        <ul class="navbar-nav ml-auto navbar-nav-3 cust">
            
          @if(auth('web')->check() || auth('tutor')->check())
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn join-us-now text-white dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('assets/images/avatar.jpg')}}" style="border-radius: 50%; width: 30px" alt="">
              </button>
              <div class="dropdown-menu">
                @if(auth('web')->check())
                <a class="dropdown-item" href="{{route('student-profile')}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"></path>
                  </svg>

                  Profile</a>
                  @else
                  <a class="dropdown-item" href="{{route('tutor-profile')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"></path>
                    </svg>

                    Profile</a>
                @endif
                <hr>
                @if(auth('web')->check())
                <a class="dropdown-item" href="{{route('student-logout')}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"></path>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
                  </svg>

                  Log Out</a>
                  @else
                  <a class="dropdown-item" href="{{route('tutor-logout')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"></path>
                      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
                    </svg>

                    Log Out</a>
                @endif
              </div>
            </div>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link nav-link-2 join-us-now" href="{{ route('shared-login-and-register') }}">
                Login</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link nav-link-2 join-us-now" href="{{ route('tutor-login') }}">
                Tutor</a>
        </li> --}}
         
          @endif
        </ul>
      </div>
    </div>
  </nav>