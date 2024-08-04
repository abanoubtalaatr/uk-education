

<div>
    @include('partials.nav-header')
    
    <main>
        <div class="container">
            <h4 class="mb-5">Subscriptions</h4>
          <div
            id="carouselExampleCaptions"
            class="carousel slide"
            data-ride="carousel"
          >
            <ol class="carousel-indicators">
              <li
                data-target="#carouselExampleCaptions"
                data-slide-to="0"
                class="active"
              ></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($subscriptions as $key=> $subscription)
                <div class="carousel-item carousel-item-new-sub @if ($key==0) active @endif ">
                    <img
                      src="{{asset('storage/'. $subscription->image)}}"
                      height="300"
                      class="d-block w-100"
                      alt="image name"
                    />
                    <div class="layout-carsoul">&nbsp;</div>
      
                    <div class="carousel-caption d-none d-md-block">
                      <div class="sub-info-new-su">
                        <h6>{{$subscription->name}}</h6>
                      </div>
                      <p>
                       {{-- {!! $subscription->description !!} --}}
                      </p>
      
                      <a href="{{route('subscriptions.show', $subscription->id)}}" class="btn btn-join-2"
                        >Subscripe Now
                      </a>
                      <button class="btn btn-join fw-bolds">{{$subscription->price}} £</button>
                    </div>
                  </div>
                @endforeach
              
              
            </div>
          </div>
        </div>
  
        <br />
        <br />
        <!-- start subscrib -->
        
      </main>
    
</div>