<div class="top-coaches">
    <div class="container-fluid y-side">
      <div class="head-coach ml-4">
        <h3>Latest Reviews</h3>
      </div>
    </div>
    <div class="container-fluid y-side">
      <div class="responsive">

        @foreach ($testimonials as $testimonial)
        <div class="col-md-12 mb-4 new-bg-reviews p-2 rounded">
            <div class="new-style-reviews">
              <div class="card py-4 custom-card">
                <div class="card-body p-3 pt-4 rounded">
                  <p>
                    {{$testimonial->comment}}
                  </p>
                  <h5 class="card-title">{{$testimonial->name}}</h5>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>
    </div>
  </div>