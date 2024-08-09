<div class="top-coaches">
 
    <div class="container-fluid y-side">
              <div class="head-coach text-center">
        <h3>Latest Reviews</h3>
      </div>
      <div class="responsive">

        @foreach ($testimonials as $testimonial)
        <div class="col-md-12  new-bg-reviews p-2 rounded">
            <div class="new-style-reviews">
              <div class="card p-3  custom-card">
                <div class="card-body  rounded">
                    <i class="fas fa-quote-left"></i>
                  <p>
                    {{$testimonial->comment}}
                  </p>
                  <h5 class="card-title">{{$testimonial->name}}</h5>
                                <i class="fas fa-quote-right"></i>

                </div>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>
    </div>
  </div>