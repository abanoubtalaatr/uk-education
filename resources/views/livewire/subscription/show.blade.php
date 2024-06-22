<div>
    @include('partials.nav-header')
    <main>
        <!-- start add cours -->
        <div class="add-2">
          <div class="container">
            <div class="row">
              <div class="head-path">
                <ul class="path-menu">
                  <li><a href="#">Home ></a></li>
                  <li><a href="#">Subscription ></a></li>
                  <li><a href="#">{{$subscription->name}}</a></li>
                </ul>
                <h3>All Videos</h3>
              </div>
            </div>
            <div class="row mb-3">
              @foreach ($subscription->videos as $video )
              <div class="col-md-3 mb-4">
                <div class="card">
                  <a
                    type="button"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    class="more-video open-new-window-video"
                    data-video-url="{{ asset('storage/' . $video->link) }}"
                  >
                    <img src="{{asset('assets/images/tour.png')}}" alt="" class="img-fluid" />
                  </a>
                  <img src="{{asset('storage/'. $video->image)}}" alt="" />
        
                  <div class="card-body border p-3 mb-0 rounded">
                    <h5 class="card-title">{{$video->name}}</h5>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
        <!-- Modal -->
        <div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
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
        
        <!-- start subscrib -->
        
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