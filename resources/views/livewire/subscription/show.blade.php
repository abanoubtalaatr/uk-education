<div>
  @include('partials.nav-header')
  <main>
    <!-- Start add course -->
    <div class="add-2">
      <div class="container">
        <div class="row">
          <div class="head-path">
            <ul class="path-menu">
              <li><a href="#">Home ></a></li>
              <li><a href="#">Subscription ></a></li>
              <li><a href="#">{{$subscription->name}}</a></li>
            </ul>
            <h3 class="mt-5">All Topics <button wire:click="bookNow" class="btn btn-info mx-5">Book now</button></h3>
            <hr>
          </div>
          
        </div>
        <div class="row mb-3">
          <div class="col-md-3 col-sm-12">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              @foreach($subscription->topics as $index => $topic)
                <button
                  class="nav-link mb-2 btn btn-join {{ $index == 0 ? 'active' : '' }}"
                  id="v-pills-{{$topic->id}}-tab"
                  data-toggle="pill"
                  data-target="#v-pills-{{$topic->id}}"
                  type="button"
                  role="tab"
                  aria-controls="v-pills-{{$topic->id}}"
                  aria-selected="{{ $index == 0 ? 'true' : 'false' }}"
                >
                  {{$topic->name}}
                </button>
              @endforeach

    
            </div>
          </div>
          <div class="col-md-9 col-sm-12">
            <div class="tab-content" id="v-pills-tabContent">
              @foreach($subscription->topics as $index => $topic)
                <div
                  class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                  id="v-pills-{{$topic->id}}"
                  role="tabpanel"
                  aria-labelledby="v-pills-{{$topic->id}}-tab"
                >
                  <div class="row row-cols-1 row-cols-md-2">
                    @foreach($topic->videos as $video)
                      <div class="col-md-6 mb-4">
                        <div class="card border">
                          <img src="{{asset('storage/' .$video->image)}}" class="card-img-top" alt="img" />
                          <a
                            type="button"
                            data-toggle="modal"
                            data-target="#exampleModal"
                            data-video-url="{{asset('storage/' . $video->link)}}"
                            class="more-video open-new-window-video"
                          >
                            <img src="{{asset('assets/images/tour.png')}}" alt="" class="float-image-video-2" />
                          </a>
                          <div class="card-body px-2">
                            <h5 class="card-title">{{$video->name}}</h5>  
                            <p class="">{!! $video->description !!}</p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-video">
        <div class="modal-content">
          <div class="modal-body text-center">
            <video id="modal-video" width="100%" controls>
              <source src="" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
        </div>
      </div>
    </div>


    @include('partials.footer')
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var videoUrl = button.data('video-url'); // Extract info from data-* attributes
        var modal = $(this);
        var video = modal.find('#modal-video');
        video.attr('src', videoUrl);
      });

      $('#exampleModal').on('hidden.bs.modal', function (event) {
        var modal = $(this);
        var video = modal.find('#modal-video');
        video.attr('src', '');
      });
    });
  </script>
</div>
