<div>
    @include('partials.nav-header')
    <main>
        <!-- start add cours -->
        <div class="add-2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="head-path ml-none">
                  <ul class="path-menu">
                    <li><a href="#">Home ></a></li>
                    <li><a href="#">crashCourses ></a></li>
                    <li><a href="#">{{$crashCourse->name}} </a></li>
                  </ul>
    
                  <h3>{{$crashCourse->name}}</h3>
                </div>
              </div>
              <div class="col-md-12">
                <div class="crashCourse-header">
                  <img
                  
                  
                    src="{{asset('storage/' . $crashCourse->image)}}"
                    alt=""
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="col-md-12">
                <div class="row top-med">
                  <div class="col-md-7">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="teaching-box left">
                          <h4>About the crashCourse</h4>
                        </div>
                      </div>
                      <div class="col-md-12 my-3">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-mute">Name</td>
                              <td>{{$crashCourse->name}}</td>
                            </tr>
                            <tr>
                                <td class="text-mute">Description</td>
                                <td>{{$crashCourse->description}}</td>
                              </tr>
                            <tr>
                              <td class="text-mute">Instructors Name</td>
                              <td>
                                {{ implode(', ', $crashCourse->tutors->pluck('name')->toArray()) }} 
                              </td>
                            </tr>
                            
                            <tr>
                              <td class="text-mute">Number of attendees</td>
                              <td>  
                                <strong>{{\App\Services\BookingService::getAttendeesNumberIncrashCourse($crashCourse->id)}} people</strong>
                            </td>
                            </tr>
                            <tr>
                              <td class="text-mute">Date</td>
                              <td>{{$crashCourse->date}}</td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 media-top top-custom">
                    <div class="row shadow">
                      <div class="col-md-12 calender-head">
                        <img
                        height="40"
                        width="40"
                          src="{{asset('storage/' . $crashCourse->image)}}"
                          alt=""
                          class="float-left ml-2 mr-4 rounded-circle"
                        />
                        <h5 class="pt-3">{{$crashCourse->name}}</h5>
                      </div>
                      <div class="col-md-12 top-sm-2">
                        {{-- <div class="calender-info"> --}}
                          {{-- <h4 class="float-right">Men only</h4> --}}
    
                          {{-- <img
                            src="assets/images/pro.png"
                            alt=""
                            class="img-fluid float-left mr-2"
                          /> --}}
                          {{-- <h5>crashCourse for</h5> --}}
                        {{-- </div> --}}
                      </div>
                      <div class="col-md-12">
                        <div class="calender-info">
                          <h4 class="float-right">{{$crashCourse->date}}</h4>
    
                          <img
                            src="{{asset('assets/images/Light-Calendar.png')}}"
                            alt=""
                            class="img-fluid float-left mr-2"
                          />
                          <h5>Time of crashCourse</h5>
                        </div>
                      </div>
                      <div class="col-md-12">
                        {{-- <div class="calender-info">
                          <h4 class="float-right">3 days in week</h4>
    
                          <img
                            src="{{asset('assets/images/Chart.png')}}"
                            alt=""
                            class="img-fluid float-left mr-2"
                          />
                          <h5>Number of lectures in week</h5>
                        </div> --}}
                      </div>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <div class="col-md-12">
                        <div class="calender-info">
                          <h4 class="float-right price-float">{{$crashCourse->price}} $</h4>
    
                          <img
                            src="{{asset('assets/images/wallet.png')}}"
                            alt=""
                            class="img-fluid float-left mr-2 mt-2"
                          />
                          <h5 class="mt-2">The Cost</h5>
                          <div class="calender-footer mt-4"></div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <hr />
                      </div>
    
                      <div class="col-md-12 d-flex justify-content-between">
                        <a
                          href="payment.html"
                          class="btn btn-join-2 mb-3 mr-1 w-100 py-3"
                          >Booking now</a
                        >
                      </div>
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
</div>