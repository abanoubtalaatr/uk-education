<!-- resources/views/subscription.blade.php -->
<div>
    @include('partials.nav-header')
    <main>
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

                        <!-- Progress Section -->
                        @if (App\Services\SubscriptionService::isSubscribe($subscription->id))
                            <div class="progress-section mb-4">
                                <div class="progress-bar-container">
                                    <div class="progress-bar-title">
                                        <span>Progress:</span>
                                        <span class="progress-percentage">{{ round($progress, 2) }}%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: {{ round($progress, 2) }}%;"></div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <hr>
                        @livewire('book-now-component', ['bookable_id' => $subscription->id, 'bookable_type' => 'App\Models\Subscription'])
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
                            <!-- Introductory Tab -->
                            <button class="nav-link mb-2 btn btn-join active" id="v-pills-intro-tab" data-toggle="pill"
                                data-target="#v-pills-intro" type="button" role="tab" aria-controls="v-pills-intro"
                                aria-selected="true">
                                Introduction
                            </button>

                            <!-- Existing Topic Tabs -->
                            @foreach ($subscription->topics()->latest()->get() as $index => $topic)
                                @php
                                    $isAccessible = !(
                                        $topic->is_paid &&
                                        !App\Services\SubscriptionService::isSubscribe($subscription->id)
                                    );
                                @endphp
                                <button class="nav-link mb-2 btn btn-join" id="v-pills-{{ $topic->id }}-tab"
                                    data-toggle="pill" data-target="#v-pills-{{ $topic->id }}" type="button"
                                    role="tab" aria-controls="v-pills-{{ $topic->id }}"
                                    aria-selected="{{ $index == 0 ? 'false' : 'false' }}">
                                    {{ $topic->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- Introductory Content -->
                            <div class="tab-pane show active" id="v-pills-intro" role="tabpanel"
                                aria-labelledby="v-pills-intro-tab">
                                <h5>Welcome to the Subscription</h5>
                                <hr>
                                <h5><strong>To accurately track progress, you must watch the video in its
                                        entirety.</strong></h5>
                                <hr>
                                <p>Here you will find all the topics covered in this subscription. Please use the tabs
                                    to navigate through the content.</p>
                            </div>

                            <!-- Existing Topic Content -->
                            @foreach ($subscription->topics as $index => $topic)
                                @php
                                    $progress = $topic->progress()->where('user_id', Auth::id())->first();
                                    $videoCompleted = $progress ? $progress->video_completed : false;
                                    $isAccessible = !(
                                        $topic->is_paid &&
                                        !App\Services\SubscriptionService::isSubscribe($subscription->id)
                                    );
                                @endphp

                                <div class="tab-pane {{ !$isAccessible ? 'locked' : '' }}"
                                    id="v-pills-{{ $topic->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-{{ $topic->id }}-tab">
                                    @if ($isAccessible || $topic->is_paid === 0)
                                        <div class="row row-cols-1 row-cols-md-2">
                                            <div class="col-md-6 mb-4">
                                                <div class="card border shadow-sm rounded p-1 card-equal-height">
                                                    <div class="card-video">
                                                        <label>Video Course</label>
                                                        <video src="{{ asset('storage/' . $topic->video) }}" controls
                                                            data-topic-id="{{ $topic->id }}" preload="auto"
                                                            class="w-100 h-100 rounded shadow"></video>
                                                        @if ($videoCompleted)
                                                            <span class="badge badge-success">Completed</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="card border shadow-sm rounded p-1 card-equal-height"
                                                    style="background-image: url('{{ asset('storage/' . $topic->image) }}'); background-size: cover; background-position: center;">
                                                    <div class="card-pdf">
                                                        <label>PDF Document</label>
                                                        <a href="{{ asset('storage/' . $topic->pdf) }}" target="_blank"
                                                            class="btn btn-outline-primary w-100">
                                                            <i class="fas fa-file-pdf"></i> View PDF
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row row-cols-1 row-cols-md-2">
                                            <div class="col-md-6 mb-4">
                                                <div class="card border shadow-sm rounded p-1 card-equal-height">
                                                    <div class="card-video">
                                                        <label>Video Course</label>
                                                        <video disabled src="{{ asset('storage/' . $topic->video) }}"
                                                            controls data-topic-id="{{ $topic->id }}" preload="auto"
                                                            class="w-100 h-100 rounded shadow"></video>
                                                        @if ($videoCompleted)
                                                            <span class="badge badge-success">Completed</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="card border shadow-sm rounded p-1 card-equal-height"
                                                    style="background-image: url('{{ asset('storage/' . $topic->image) }}'); background-size: cover; background-position: center;">
                                                    <div class="card-pdf">
                                                        <label>PDF Document</label>
                                                        <a disabled href="{{ asset('storage/' . $topic->pdf) }}"
                                                            target="_blank" class="btn btn-outline-primary w-100">
                                                            <i class="fas fa-file-pdf"></i> View PDF
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Overlay and Message for Locked Topics -->
                                        <div class="overlay">
                                            <div class="alert alert-warning locked-message">
                                                This topic is locked. Please subscribe to access this content.
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="notification-card" class="notification-card d-none">
            <div class="notification-content">
                <span id="notification-message"></span>
                <button id="notification-close" class="close-btn">&times;</button>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('163895057bb1afaae453', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('MockExamCreated', function(data) {
            // Show notification card
            var notificationCard = document.getElementById('notification-card');
            var notificationMessage = document.getElementById('notification-message');

            // Create clickable link
            var link = '{{ route("mock-exams.book-mock", ":id") }}';
            link = link.replace(':id', data.mockExam.id);

            notificationMessage.innerHTML = 'New Mock Exam Created: <a href="' + link + '" target="_blank">' + data.mockExam.name + '</a>';

            notificationCard.classList.remove('d-none');
        });


        // Close button event listener
        document.getElementById('notification-close').addEventListener('click', function() {
            var notificationCard = document.getElementById('notification-card');
            notificationCard.classList.add('d-none');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('video').forEach(function(videoElement) {
                videoElement.addEventListener('ended', function() {
                    let topicId = videoElement.getAttribute('data-topic-id');
                    axios.post('{{ route('complete.video') }}', {
                            topic_id: topicId
                        })
                        .then(response => {
                            window.location.reload();
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            });
        });
    </script>

    <style>
        .card-equal-height {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-equal-height .card-video,
        .card-equal-height .card-pdf {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-equal-height .card-video video,
        .card-equal-height .card-pdf a {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.25rem 0.25rem 0 0;
        }

        .card-pdf {
            position: relative;
            color: white;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.6);
            /* Semi-transparent overlay */
        }

        .card-pdf a {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 1rem;
            border-radius: 0.25rem;
            text-decoration: none;
            color: #007bff;
        }

        .card-pdf a:hover {
            background-color: #e9ecef;
            color: #0056b3;
        }

        .progress-section {
            padding: 1rem;
            border-radius: 0.25rem;
            background: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .progress-bar-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .progress-bar-title {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .progress-percentage {
            font-weight: bold;
            color: #28a745;
        }

        .progress-bar {
            width: 100%;
            height: 1.5rem;
            background: #e9ecef;
            border-radius: 0.25rem;
            overflow: hidden;
            position: relative;
        }

        .progress-fill {
            height: 100%;
            background: #28a745;
            transition: width 0.3s ease;
        }

        .badge-success {
            background-color: #28a745;
            color: white;
            padding: 0.25em 0.5em;
            font-size: 0.875em;
            border-radius: 0.25rem;
        }

        .locked {
            pointer-events: none;
            opacity: 0.5;
            position: relative;
        }

        .locked .card-video,
        .locked .card-pdf {
            position: relative;
            z-index: 1;
        }

        .locked .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            z-index: 2;
        }

        .locked-message {
            margin: 0;
        }

        .notification-card {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        .notification-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .close-btn {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: #721c24;
            cursor: pointer;
        }
    </style>
</div>
