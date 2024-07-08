<div>
    @include('partials.nav-header')
    <main>
        <!-- start add cours -->
        <div class="add-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="head-path ml-none">
                            <h3>Your Account information</h3>
                        </div>
                    </div>
                    <div class="col-md-12 top">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link mx-2 mb-3 active" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Personal Data</a>

                                <a class="nav-item nav-link mx-2 mb-3 last" id="nav-contact-5-tab" data-toggle="tab"
                                    href="#nav-contact-5" role="tab" aria-controls="nav-contact-5"
                                    aria-selected="false">Calender
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!-- start first tab -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row top">
                                    <div class="col-md-6">
                                        <div class="info">
                                            <h3>Personal Data</h3>
                                            <div class="up-img top-med">
                                                <input type="file" class="imgpo" onchange="readURLL(this);" />
                                                <span class="file-hover">Change </span>
                                                <img id="blah" src="{{ asset('assets/images/avatar.jpg') }}"
                                                    alt="" class="img-fluid" />
                                            </div>

                                            <form class="top-med">
                                                <div class="form-group">
                                                    <input wire:model="information.name" type="name"
                                                        class="form-control" id="userEmail" placeholder="name" />
                                                </div>

                                                <div class="form-group">
                                                    <input wire:model="information.email" type="email"
                                                        class="form-control" id="userEmail" placeholder="Your Email" />
                                                </div>
                                                <div class="form-group">
                                                    <input wire:model="information.mobile" type="number"
                                                        class="form-control" id="userphone"
                                                        placeholder="phone number" />
                                                </div>
                                                <div class="form-group">
                                                    <input wire:model="information.whats_app_number" type="number"
                                                        class="form-control" id="whatsappNumber"
                                                        placeholder="whatsapp number" />
                                                </div>
                                                <button wire:click="updateProfile" type="button"
                                                    class="btn btn-next float-right my-4">
                                                    Save Change
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info">
                                            <h3>Change Password</h3>
                                            <form class="top-med">
                                                <div class="form-group mt-5">
                                                    <input type="password" class="form-control" id="oldPassword"
                                                        placeholder=" Old Password" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="NewPassword"
                                                        placeholder=" New Password" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="rePassword"
                                                        placeholder=" Retype Password" />
                                                </div>
                                                <button type="submit" class="btn btn-next float-right mt-4">
                                                    Save Change
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- start 3 tab -->

                            <div class="tab-pane fade " id="nav-contact-3" role="tabpanel"
                                aria-labelledby="nav-contact-3-tab">
                                <div class="row">
                                    <div class="col-md-12 top-sm-2">
                                        <div class="package-head ml-none">
                                            <div class="list float-right">
                                                <span>({{ $crashCourses->count() }}) in the list</span>
                                            </div>
                                            <h3>Crash Courses</h3>
                                        </div>
                                    </div>
                                    @foreach ($crashCourses as $crash)
                                        <div class="col-md-12  border-attend">
                                            <div class="row search-top">
                                                <div class="col-md-4">
                                                    <div class="result-image">
                                                        <img src="{{ asset('storage/' . $crash->image) }}"
                                                            alt="" class="img-fluid" />
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="result">
                                                        <div class="result-confirm float-right mr-4">
                                                            <h4 class="pr-2 pb-2">{{ $crash->price }} $</h4>
                                                            <a href="#"
                                                                class="btn btn-join ser-btn float-right">More Detail's
                                                            </a>
                                                        </div>
                                                        <div class="result-info">
                                                            <h3>{{ $crash->name }}</h3>
                                                            <h3>{{ $crash->date }}</h3>

                                                            <p>
                                                                {{ $crash->description }}
                                                            </p>
                                                            <p class="float-left mr-3 n-attend">
                                                                Number of attendees:
                                                                <span class="ateend-dark">
                                                                    {{ \App\Services\CrashCourseService::getTotalStudentsInCrashCourseByTutor($subscription, auth('tutor')->id()) }}
                                                                    people
                                                                </span>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- start 4 tab -->

                            <!-- start last one -->
                            <div class="tab-pane fade" id="nav-contact-5" role="tabpanel"
                                aria-labelledby="nav-contact-5-tab">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mt-2">
                                                <button class="btn btn-join mr-2"
                                                    wire:click.prevent="previousWeek">Previous Week</button>
                                                <button class="btn btn-join mr-2" wire:click.prevent="nextWeek">Next
                                                    Week</button>
                                            </div>
                                            <p class="mb-0 mr-2 border">{{ $currentWeek }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="text-center">Sunday</th>
                                                        <th class="text-center">Monday</th>
                                                        <th class="text-center">Tuesday</th>
                                                        <th class="text-center">Wednesday</th>
                                                        <th class="text-center">Thursday</th>
                                                        <th class="text-center">Friday</th>
                                                        <th class="text-center">Saturday</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                                                            <td class="">
                                                                <div class="day">
                                                                    @if (isset($bookings[$day]) && count($bookings[$day]) > 0)
                                                                        @foreach ($bookings[$day] as $booking)
                                                                            <div
                                                                                class="booking pl-1 my-2 rounded border cursor-pointer">
                                                                                @if($booking->tutor)
                                                                                <p class="mb-1"
                                                                                    style="font-size: 12px"><strong
                                                                                        class="">Tutor:</strong>
                                                                                    {{ $booking->tutor?->name }}
                                                                                </p>
                                                                                @endif
                                                                                <p class="mb-0"
                                                                                    style="font-size: 12px">
                                                                                    <strong>Time:</strong>
                                                                                    {{ \Carbon\Carbon::parse($booking->start_at)->format('H:i') }}
                                                                                    -
                                                                                    {{ \Carbon\Carbon::parse($booking->end_at)->format('H:i') }}
                                                                                </p>
                                                                                <p class="mb-1"
                                                                                    style="font-size: 12px"><strong
                                                                                        class="">Type :</strong>
                                                                                    {{ $booking->type }}
                                                                                </p>
                                                                                <p class="mb-1" style="font-size: 12px">
                                                                                    <strong class="">Details :</strong>
                                                                                    <a target="_blank" href="{{ $booking->details_route}}">Show</a>
                                                                                </p>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <p class="mb-0">No bookings</p>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End calendar section -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .package-head {
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid white;
            }

            .navigation-buttons button {
                margin-right: 10px;
            }

            .calendar-table {
                margin-top: 20px;
            }

            .calendar-table table {
                width: 100%;
                border: 1px solid white;
            }

            .calendar-table th,
            .calendar-table td {
                text-align: center;
                padding: 10px;
            }

            .booking p {
                margin: 5px 0;
            }

            .booking {
                transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            }

            .booking:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 8px white;
            }
        </style>
        <!-- start subscrib -->
        @include('partials.footer')
    </main>

</div>
