<div>
    @include('partials.nav-header')
    <main>
        <!-- start add course -->
        <div class="add-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="head-path ml-none">
                            <ul class="path-menu list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fas fa-home"></i> Home ></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fas fa-file-alt"></i> Mock ></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fas fa-file-alt"></i> {{ $mockExam->name }}</a></li>
                            </ul>
                            <h3 class="mt-4">{{ $mockExam->name }}</h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="teaching-box h-100 flex-column">
                            <ul class="list-inline">
                                <li class="list-inline-item text-dark">
                                    <img src="{{ asset('assets/images/Calendar.png') }}" alt="" class="img-fluid" />
                                    <span class="text-dark">{{ $mockExam->date }}</span>
                                </li>
                            </ul>
                            <hr>
                            <p class="text-dark">
                                <i class="fas fa-dollar-sign"></i> {{ $mockExam->price }}
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Tutors</h5>

                @if (!$mockExam->isBookedByAuthUser()->exists())
                    @if (isset($message))
                        <div class="alert alert-info mt-2">{{ $message }}</div>
                    @endif
                    <div class="row">
                        @foreach ($tutors as $tutor)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="{{ route('tutors.about', $tutor->id) }}" class="text-center border rounded tutor-card p-3 h-100 d-block">
                                    <img src="{{ asset('storage/' . $tutor->photo) }}" alt="" class="img-fluid pro-image rounded-circle mb-3" height="120" />
                                    <h5 class="pro-name font-weight-bold">{{ $tutor->name }}</h5>
                                    <hr>
                                    <p class="pro-about">{{ Str::limit($tutor->about, 100) }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </main>
    <!-- start subscribe -->
    @include('partials.footer')

    <style>
        .active-tutor {
            background: lavender;
        }

        .path-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .path-menu li {
            margin-right: 10px;
        }

        .path-menu a {
            text-decoration: none;
            color: #007bff;
        }

        .head-path {
            margin-bottom: 20px;
        }

        .add-2 {
            padding: 20px 0;
        }

        .tutor-card:hover {
            background-color: #f8f9fa;
            transition: background-color 0.3s;
        }

        .pro-name {
            font-size: 1.1rem;
            color: #333;
        }

        .pro-about {
            font-size: 0.9rem;
            color: #666;
        }
    </style>

    @push('scripts')
        <script>
            Livewire.on('dateSelected', date => {
                Livewire.emit('dateSelected', date);
            });
        </script>
    @endpush
</div>
