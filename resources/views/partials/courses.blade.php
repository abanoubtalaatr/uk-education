<div class="top-coaches">
 
      <div class="container-fluid y-side">
                  <div class="head-coach text-center">
          <h3>Newly Added Courses</h3>
        </div>
        <div class="responsive">
          @foreach ($courses as $course)
          <div class="col-md-12 mb-4">
            <div class="card new-height-cards">
              <a href="{{route('courses.show', $course->id)}}">
                <img
                  src="{{asset('storage/'. $course->image)}}"
                  class="card-img-top card-top img-fluid"
                  alt="..."
                />
              </a>

              <h4 class="card-info small small-heading-size">{{$course->name}}</h4>
              {{-- <p class="">{{ Str::limit($course->description, 100) }}</p> --}}
              
              <a
                href="{{asset('storage/'. $course->image)}}"
                data-lightbox="roadtrip"
                data-title="My caption"
                ><div class="layout">&nbsp;</div>
              </a>
              <div class="card-body border p-3 mb-2 rounded">

                <a href="{{route('courses.show', $course->id)}}" class="btn btn-join float-right"
                  >Booking Now
                </a>
                <span>{{$course->price}} £</span>
              </div>
            </div>
          </div>
          @endforeach
          
          
        </div>
      </div>
    </div>
    
    <style>
        .card{
            box-shadow:0px 0px 0px 0px;
        }
.card-body {
  min-height: 80px;
  max-height: 80px;
}

    </style>
    