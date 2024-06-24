<div>
  @include('partials.nav-header')
  <main>

      <!-- start add course -->
      <div class="add-2">
        <div class="container">
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
                        <h4 class="mb-2"> Tutors</h4>
                        <div class="row">
                          @foreach ($tutors as $tutor)
                            <button wire:click="selectTutor({{ $tutor->id }})" class="mx-2 border btn mb-2 @if ($tutor->id == $selectedTutor) active @endif">
                                <img
                                  src="{{asset('storage/'. $tutor->photo)}}"
                                  alt=""
                                  class="img-fluid pro-image rounded-circle "
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
                          <div class="row">
                            @foreach($availableTimes as $time)
                              <button wire:click="chooseTime('{{ $time }}')" id="{{ $time }}" class="btn btn-join-2 mx-2 col-md-3 mb-3">{{ $time }}</button>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      <a href="{{route('payment')}}" class="btn btn-join">Book now</a>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- start subscribe -->
  
      @include('partials.footer')
  </main>
  <style>
      .active {
        background: #343a4;
      }
  </style>
</div>

@push('scripts')
  <script>
      Livewire.on('dateSelected', date => {
          Livewire.emit('dateSelected', date);
      });
  </script>
@endpush
