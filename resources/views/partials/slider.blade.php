<div class="header">
    <div class="container-fluid y-side-big">
      <!--  -->

      <div
        id="carouselExampleControls"
        class="carousel slide"
        data-ride="carousel"
      >
        <div class="carousel-inner" style="height: 350px">
            @foreach ($sliders as $key=> $slider)
            <div class="carousel-item @if($key == 0) active @endif">
                <div class="row">
                  <div class="col-md-6">
                    <div class="hero-box-info">
                      <h1>{{$slider->title}}</h1>
                      <p class="w-100">
                        {{$slider->description}}
                      </p>
                      <a href="{{$slider->link}}" class="btn btn-next">
                        {{$slider->button_name}}
                      </a>
                    </div>
                  </div>
    
                  <div class="col-md-6">
                    <div class="hero-box-image " style="height: 240px;
                    width: 360px;">
                      <img
                        src="{{asset('storage/'. $slider->image)}}"
                        alt=""
                        class="img-fluid hero-image-responsive w-100 h-100"
                      />
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          
          
        </div>
      </div>
    </div>
  </div>
  <div class="svg-carsoul-home">
    <svg
      role="button"
      data-target="#carouselExampleControls"
      data-slide="prev"
      xmlns="http://www.w3.org/2000/svg"
      width="16"
      height="16"
      fill="currentColor"
      class="bi bi-arrow-left carousel-me-prev"
      viewBox="0 0 16 16"
    >
      <path
        fill-rule="evenodd"
        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"
      />
    </svg>

    <svg
      role="button"
      data-target="#carouselExampleControls"
      data-slide="next"
      xmlns="http://www.w3.org/2000/svg"
      width="16"
      height="16"
      fill="currentColor"
      class="bi bi-arrow-right carousel-me-next"
      viewBox="0 0 16 16"
    >
      <path
        fill-rule="evenodd"
        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"
      />
    </svg>
  </div>