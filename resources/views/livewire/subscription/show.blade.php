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
                            <li><a href="#">{{ $subscription->name }}</a></li>
                        </ul>
                        <h3 class="mt-5">All Chapters</h3>
                        <hr>
                        @livewire('book-now-component', ['bookable_id' => $subscription->id, 'bookable_type' => "App\Models\Subscription"])
                        <hr>
                    </div>
                </div>
                <div class="row rounded"
                    style="background: url('{{ asset('storage/' . $subscription->image) }}') no-repeat center center; background-size: cover; position: relative; padding: 20px;">
                    <div class="overlay"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
                    </div>
                    <div class="col-md-6 text-white" style="position: relative; z-index: 1;">
                        {!! $subscription->description !!}
                    </div>
                    <div class="col-md-6" style="position: relative; z-index: 1;">
                        <video src="{{ asset('storage/' . $subscription->video) }}" controls
                            class="w-100 h-100 rounded shadow"></video>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            @foreach ($subscription->topics()->latest()->get() as $index => $topic)
                                <button
                                    class="nav-link mb-2 btn btn-join {{ $index == 0 ? 'active' : '' }} {{ $topic->is_paid ? 'locked' : '' }}"
                                    id="v-pills-{{ $topic->id }}-tab" data-toggle="pill"
                                    data-target="#v-pills-{{ $topic->id }}" type="button" role="tab"
                                    aria-controls="v-pills-{{ $topic->id }}"
                                    aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                    {{ $topic->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            @foreach ($subscription->topics as $index => $topic)
                                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                    id="v-pills-{{ $topic->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-{{ $topic->id }}-tab">
                                    <div class="row row-cols-1 row-cols-md-2">
                                        <div class="col-md-6 mb-4">
                                            <div class="card border shadow-sm rounded card-equal-height">
                                                <a target="_blank" href="{{ asset('storage/' . $topic->pdf) }}">
                                                    <img src="{{ asset('storage/' . $topic->image) }}" alt=""
                                                        class="img-fluid">
                                                    <h5 class="my-2 mx-1">{{ $topic->name }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="card border shadow-sm rounded p-1 card-equal-height">
                                                <div class="card-video">
                                                    <label>Video Course</label>
                                                    <video src="{{ asset('storage/' . $topic->video) }}"
                                                        controls></video>
                                                </div>
                                            </div>
                                        </div>
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
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-3">
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
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var videoUrl = button.data('video-url'); // Extract info from data-* attributes
                var modal = $(this);
                var video = modal.find('#modal-video');
                video.attr('src', videoUrl);
            });

            $('#exampleModal').on('hidden.bs.modal', function(event) {
                var modal = $(this);
                var video = modal.find('#modal-video');
                video.attr('src', '');
            });
        });
    </script>

    <style>
        .card-equal-height {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-equal-height .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-equal-height .card-video {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-equal-height .card-video video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.25rem 0.25rem 0 0;
        }

        .pdf-container {
            position: relative;
            height: 100%;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pdf-container .pdf-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .pdf-container .pdf-content a {
            color: #fff;
            font-size: 1.25rem;
            text-decoration: none;
        }

        .locked {
            pointer-events: none;
            opacity: 0.5;
            cursor: not-allowed;
        }

        .disabled-link {
            pointer-events: none;
            color: #6c757d;
            /* Bootstrap's muted color */
            cursor: not-allowed;
        }

        .btn-outline-primary .fas.fa-file-pdf {
            color: #007bff;
            /* Bootstrap primary color */
        }

        .btn-outline-primary {
            border-color: #007bff;
        }
    </style>
</div>
