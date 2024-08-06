<div>
    @include('partials.nav-header')
    <main>
        <div class="add-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="head-path ml-none">
                            <h3>Your Account Information</h3>
                        </div>
                    </div>
                    <div class="col-md-12 top">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link mx-2 mb-3 active" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Personal Data</a>
                                <a class="nav-item nav-link mx-2 mb-3" href="{{ route('student-calendar') }}"
                                    role="tab" aria-controls="nav-calendar" aria-selected="false">Calendar</a>
                                <a class="nav-item nav-link mx-2 mb-3" id="nav-result-tab" data-toggle="tab"
                                    href="#nav-result" role="tab" aria-controls="nav-result"
                                    aria-selected="false">Results</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                @if (session()->has('message'))
                                    <div class="alert alert-info">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <div class="info">
                                            <label>Profile Image</label>
                                            <div class="up-img border">
                                                <input type="file" class="imgpo" wire:model="profileImage" />
                                                @if ($profileImageUrl)
                                                    <img height="90" width="120" src="{{ $profileImageUrl }}"
                                                        alt="Profile Image" class="img-fluid" />
                                                @endif
                                            </div>
                                            <hr>
                                            <div>
                                                <label>Screenshot of Exam Confirmation Email</label>
                                                <div class="up-img border">
                                                    <input type="file" class="imgpo"
                                                        wire:model="examConfirmationEmail" />
                                                    <div class="d-flex">
                                                        @if ($examConfirmationEmailUrl)
                                                            <img height="90" width="120"
                                                                src="{{ $examConfirmationEmailUrl }}"
                                                                alt="Exam Confirmation Email" class="img-fluid" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <label>First Upload Exam Confirmation Images</label>
                                                <div class="up-img border">
                                                    <input type="file" class="imgpo"
                                                        wire:model="examConfirmationOne" />
                                                    <div class="d-flex">
                                                        @if ($examConfirmationOneUrl)
                                                            <img height="90" width="120"
                                                                src="{{ $examConfirmationOneUrl }}"
                                                                alt="Exam Confirmation Email" class="img-fluid" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div>
                                                    <label>Second Upload Exam Confirmation Images</label>
                                                    <hr>
                                                    <div class="up-img border">
                                                        <input type="file" class="imgpo"
                                                            wire:model="examConfirmationTwo" />
                                                        <div class="d-flex">
                                                            @if ($examConfirmationTwoUrl)
                                                                <img height="90" width="120"
                                                                    src="{{ $examConfirmationTwoUrl }}"
                                                                    alt="Exam Confirmation Email" class="img-fluid" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <form class="top-med" wire:submit.prevent="updateProfile">
                                                        <div class="form-group">
                                                            <input wire:model.defer="information.name" type="text"
                                                                class="form-control" placeholder="Name" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input wire:model.defer="information.email" type="email"
                                                                class="form-control" placeholder="Your Email" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input wire:model.defer="information.mobile" type="text"
                                                                class="form-control" placeholder="Phone Number" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input wire:model.defer="information.whats_app_number"
                                                                type="text" class="form-control"
                                                                placeholder="WhatsApp Number" />
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-next float-right my-4">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info">
                                            <h3>Change Password</h3>
                                            <form class="top-med" wire:submit.prevent="updatePassword">
                                                <div class="form-group mt-5">
                                                    <input wire:model.defer="oldPassword" type="password"
                                                        class="form-control" placeholder="Old Password" />
                                                    @error('oldPassword')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input wire:model.defer="password" type="password"
                                                        class="form-control" placeholder="New Password" />
                                                </div>
                                                <div class="form-group">
                                                    <input wire:model.defer="password_confirmation" type="password"
                                                        class="form-control" placeholder="Retype Password" />
                                                </div>
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <button type="submit" class="btn btn-next float-right mt-4">Save
                                                    Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-result" role="tabpanel"
                                aria-labelledby="nav-result-tab">
                                <div class="row mt-5">
                                    @foreach ($results as  $result)
                                        <div class="col-12 border my-2 p-2 rounded">
                                            <p>Mock Exam : <strong>{{$result->mockExam->name}}</strong></p>
                                            <a  href="storage/{{$result->pdf}}">
                                                <i class="fas fa-file-pdf"></i> Result
                                            </a>
                                            
                                        </div>
                                    @endforeach
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
                        padding: 10px;
                        text-align: center;
                        border: 1px solid white;
                    }
                </style>
    </main>
</div>
