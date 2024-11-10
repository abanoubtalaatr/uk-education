<div class="header">
    <div class="container-fluid y-side-big">

      <div
        id="carouselExampleControls"
        class="carousel slide "
        data-ride="carousel"
      >
        <div class="carousel-inner">
            @foreach ($sliders as $key=> $slider)
            <div class="carousel-item @if($key == 0) active @endif">
                <div class="row" style="align-items: center;">
                            
                  <div class="col-md-8">
                    <div class="hero-box-info limit-texts mb-3 position-relative">
                        
 
                      <h2 class="text-white fw-bolder new-issues-of-title">{{$slider->title}}</h2>
                      <p class="w-100">
                        {{$slider->description}}
                      </p>
                      <a href="{{$slider->link}}" class="btn btn-next w_unset">
                        {{$slider->button_name}}
                      </a>
                      <br /<>
                    </div>
                  </div>
    
                  <div class="col-md-4">
                    <div class="hero-box-image position-relative">
               
                      <img
                        src="{{asset('storage/'. $slider->image)}}"
                        alt=""
                        class="img-fluid  hero-box-layout"
             
                      />
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          
          
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
      <div class='row'>
          <div class='col-lg-12'>
                      {{-- @include('partials.search') --}}

          </div>
      </div>
    </div>
  </div>
 



      
      
      
      
      
      <style>
.hero-box-layout{
        /*position: absolute;*/
    /*width: 300px;*/
    /*height: 100%;*/
    /*border: 15px solid red;*/
    /*transform: rotate(81deg);*/
    /*opacity: 0.5;*/
      margin-bottom: -50px;
}
.carousel-me-prev {
    position: absolute;
    left: 150px;
    cursor: pointer;
    color: #fff;
    bottom: 93%;
}
.carousel-me-next {
    position: absolute;
    bottom: 93%;
    left: 200px;
    cursor: pointer;
    color: #fff;
}
}
.hero-box-info p {
  color: #fff;
  font-size: 14px;
  width: 65%;
}

.hero-box-info {
  margin-top: 3rem;
}
          

.limit-texts {
  width: 100%; /* Set your desired width */
  height: auto; /* Set your desired height */
  overflow: hidden; /* Ensures content does not overflow */
}

.limit-texts p {
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
  overflow: hidden;
  text-overflow: ellipsis;
  max-height: 5em;
}
          
@media only screen and (max-width: 600px) {
    .new-issues-of-title{
        font-size: 25px !important;
    }

  .hero-box-info {
    transform: unset;
    margin: 25px 0;
    text-align: center;
  }
  
    .hero-box-info h1 {
    /* font-size: 40px; */
  }
  .hero-box-info p {
    width: 100%;
  }

  /*.hero-image-responsive {*/
  /*  display: none;*/
  /*}*/

}


@media only screen and (max-width: 1024px) and (min-width: 768px) {
  /*.hero-image-responsive {*/
  /*  display: none;*/
  /*}*/
  
      .new-issues-of-title{
        font-size: 25px !important;
    }
}
      </style>