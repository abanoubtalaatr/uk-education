<div>
    @include('partials.nav-header')
    <main>

        <!-- start add cours -->
        <div class="add-2">
          <div class="container-fluid y-side">
            <div class="row">
              <div class="col-md-12">
                <div class="head-path ml-none">
                  <ul class="path-menu">
                    <li><a href="#">Home ></a></li>
                    <li><a href="#">Mock ></a></li>
                    <li><a href="#">{{$mockExam->name}} </a></li>
                  </ul>
    
                  <h3>{{$mockExam->name}}</h3>
                </div>
              </div>
              <div class="col-md-12">
                <div class="course-header">
                  <img
                    src="{{asset('storage/' . $mockExam->image)}}"
                    alt=""
                    class="img-fluid"
                  />
                </div>
              </div>
              <div class="col-md-12">
                <div class="row top-med">
                  <div class="col-md-7">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="teaching-box left">
                          <h4>About the Mock</h4>
                          <ul class="Calendar">
                            <li>
                              <img
                                src="{{asset('assets/images/Calendar.png')}}"
                                alt=""
                                class="img-fluid"
                              />
                              <span>{{$mockExam->date}} </span>
                            </li>
                            
                          </ul>
    
                          <p>
                            {{$mockExam->description}}
                          </p>
                          
                        </div>
                      </div>
                      <div class="col-md-12 top-med">
                        <div class="teaching-box left">
                          <h4>About the Tutor</h4>
                          <div class="row">
                            @foreach ($tutors as $tutor)
                            <button wire:click="selectTutor({{ $tutor->id }})" class="mx-2 border-none">
                                <img
                                  src="{{asset('assets/images/Coach.png')}}"
                                  alt=""
                                  class="img-fluid pro-image"
                                />
                                <p class="mt-3 pro-name">{{$tutor->name}}</p>
                              </button>
                            
                            @endforeach
                          </div>
                        </div>
                      </div>
    
                      <div>
                        
                        <div class="col-md-12 top-med">
                         @if(isset($message))
                         <div class="alert alert-info">{{$message}}</div>
                         @endif
                            <div class="teaching-box left">
                                <h4>Available Day</h4>
                            </div>
                            <div class="check top-med">
                                <div class="row">
                                  <input type="date" wire:change="getAvailableTime($event.target.value)" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-12 top-med">
                            <div class="teaching-box left">
                                <h4>Available Time</h4>
                            </div>
                            <div class="check top-med">
                                <div class="row ">
                                  @foreach($availableTimes as $time)
                                  <button wire:click="chooseTime('{{ $time }}')" id="{{ $time }}" class="btn btn-join-2 mx-2 col-md-3 mb-3">{{ $time }}</button>
                                  @endforeach

                              
                                </div>
                            </div>
                        </div>
                        <button wire:click="bookNow" class="btn btn-join">Book now</button>
                    </div>
                    
                    </div>
                  </div>
                  <div class="col-md-5 media-top top-custom">
                    <div class="row shadow">
                      <div class="col-md-12 calender-head">
                        <img
                          src="{{asset('assets/images/Calendar.png')}}"
                          alt=""
                          class="float-left ml-2 mr-4"
                        />
                        <h5 class="pt-3">{{$mockExam->name}}</h5>
                      </div>
                      <div class="col-md-12 top-sm-2">
                      </div>
                      <div class="col-md-12">
                        <div class="calender-info">
                          <h4 class="float-right">{{$mockExam->date}}</h4>
    
                          <img
                            src="{{asset('assets/images/Light-Calendar.png')}}"
                            alt=""
                            class="img-fluid float-left mr-2"
                          />
                          <h5>Time of Course</h5>
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
                          <h4 class="float-right price-float">{{$mockExam->price}} $</h4>
    
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
@push('scripts')
    <script>
        Livewire.on('dateSelected', date => {
            Livewire.emit('dateSelected', date);
        });
    </script>
@endpush