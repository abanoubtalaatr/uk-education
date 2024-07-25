<div>
    @include('partials.nav-header')
    <main>
        <!-- start add cours -->
        <div class="add-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="head-path ml-none">
                            <ul class="path-menu list-inline">
                                <li class="list-inline-item"><a href="#">Home ></a></li>
                                <li class="list-inline-item"><a href="#">Tutors > </a></li>
                                <li class="list-inline-item"><a href="#">Tutor > {{ $tutor->name }} </a></li>
                            </ul>
                            <h3 class="mt-3">Tutor Profile</h3>
                        </div>
                    </div>
                    <div class="col-md-12 top-med">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <img src="{{ asset('storage/' . $tutor->photo) }}" alt="" class="img-fluid" />
                                    <div class="info-text">
                                        <strong>{{ $tutor->name }}</strong>
                                        <p class="text-wrap">{{ $tutor->about }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <div class="form-group mt-3 w-100">
                                        <label for="datePicker">Choose a Day:</label>
                                        <input type="date" id="datePicker" wire:change="getAvailableTime($event.target.value)" class="form-control">
                                    </div>
                                    @if ($availableTimes)
                                        <div class="row mt-3">
                                            @foreach ($availableTimes as $time)
                                                <div class="col-md-4">
                                                    <button wire:click="chooseTime('{{ $time }}')" id="{{ $time }}" class="btn btn-join-2 mx-2 mb-3">{{ $time }}</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="mt-3">
                                        
                                        @if (\App\Services\UserTypeService::isAuth())
                                        @if (\App\Services\UserTypeService::isStudent())
                                            <button wire:click="bookNow" class="btn btn-join"><i class="fas fa-ticket-alt"></i> Book now</button>
                                        @endif
                                    @else
                                        @if (\App\Services\UserTypeService::isTutor())
                                            <a href="{{ route('student-register') }}" class="btn btn-join"><i class="fas fa-ticket-alt"></i> Join now<a>
                                                    <a href="{{ route('student-login') }}" class="btn btn-join"><i class="fas fa-ticket-alt"></i> Login as
                                                        student<a>
                                        @endif
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </main>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .path-menu {
            padding: 10px 0;
            list-style-type: none;
        }
        .path-menu li {
            display: inline;
            font-size: 14px;
        }
        .path-menu li a {
            color: #007bff;
            text-decoration: none;
        }
        .path-menu li a:hover {
            text-decoration: underline;
        }
        .head-path {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .info-box {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .info-box img {
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .info-box strong {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .info-box p {
            font-size: 14px;
            color: #6c757d;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-join, .btn-join-2 {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-join:hover, .btn-join-2:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-join-2 {
            margin: 5px;
        }
    </style>
</div>
