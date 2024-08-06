<main>
    <!-- start of section center-1 -->
    <section class="center-1 user">
        <div class="center-overlay">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="center-ul my-4">
                            <li>
                                <div class="logo-container">
                                    <a href="/">
                                        <img class="my-4" height="80" width="120"
                                            src=" {{ asset('storage/' . $settings['logo']) }}" alt="Logo ">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="head-list-info">
                                    <h1>ARS MEDICA</h1>
                                    <p>
                                        Sed ut perspiciatis unde omnis istpoe natus error sit
                                        voluptatem accusantium doloremque eopsloi laudantium
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="center-menu">
                                    <a href="/">Home</a>
                                    <a href="About.html">About</a>
                                    <a href="contact-us.html">Contact</a>
                                    <a href="privacy-policy.html">Privacy</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 p-right-none">
                        <div class="center-form">
                            <h3>Create an Account</h3>
                            <p>
                                Already have an account?
                                <a href="{{ route('student-login') }}">Sign in</a>
                            </p>
                            <div class="center-form-input">
                                <form>

                                    <div class="form-group">
                                        <input wire:model="form.name" type="text" class="form-control" id="name"
                                            placeholder="Name" />
                                        @error('form.name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input wire:model="form.email" type="email" class="form-control"
                                            id="userEmail" placeholder="Your Email" />
                                        @error('form.email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input wire:model="form.mobile" type="number" class="form-control"
                                            id="userphone" placeholder="phone number" />
                                        @error('form.mobile')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input wire:model="form.whats_app_number" type="number" class="form-control"
                                            id="whatsappnumber" placeholder="whatsapp number" />
                                        @error('form.whats_app_number')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input wire:model="form.gmc_number" type="number" class="form-control"
                                            id="gmc_number" placeholder="GMC Number" />
                                        @error('form.gmc_number')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                      <input wire:model="form.exam_date" type="date" class="form-control"
                                          id="exam_date" placeholder="Exam Date" />
                                      @error('form.exam_date')
                                          <p class="text-danger">{{ $message }}</p>
                                      @enderror
                                  </div>
                                    <div class="form-group">
                                        <input wire:model="form.password" type="password" class="form-control"
                                            id="userPassword" placeholder=" Password" />
                                        @error('form.password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input wire:model="form.password_confirmation" type="password"
                                            class="form-control" id="userRePassword" placeholder="Confirm Password" />
                                        @error('form.password_confirmation')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Screenshot of Exam Confirmation Email</label>
                                        <div class="up-img border">
                                            <input type="file" class="imgpo" wire:model="examConfirmationEmail" />
                                            <div class="d-flex">

                                                @if ($examConfirmationEmailUrl)
                                                    <img height="90" width="120"
                                                        src="{{ $examConfirmationEmailUrl }}"
                                                        alt="Exam Confirmation Email" class="img-fluid" />
                                                @endif

                                            </div>
                                        </div>
                                        @error('examConfirmationEmail')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>First Upload Exam Confirmation Images</label>

                                        <div class="up-img border">
                                            <input type="file" class="imgpo" wire:model="examConfirmationOne" />
                                            <div class="d-flex">

                                                @if ($examConfirmationOneUrl)
                                                    <img height="90" width="120"
                                                        src="{{ $examConfirmationOneUrl }}"
                                                        alt="Exam Confirmation Email" class="img-fluid" />
                                                @endif

                                            </div>
                                        </div>

                                        @error('examConfirmationOne')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Second Upload Exam Confirmation Images</label>
                                        <hr>
                                        <div class="up-img border">
                                            <input type="file" class="imgpo" wire:model="examConfirmationTwo" />
                                            <div class="d-flex">

                                                @if ($examConfirmationTwoUrl)
                                                    <img height="90" width="120"
                                                        src="{{ $examConfirmationTwoUrl }}"
                                                        alt="Exam Confirmation Email" class="img-fluid" />
                                                @endif

                                            </div>
                                        </div>
                                        @error('examConfirmationTwo')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="button" wire:click="register"
                                        class="btn btn-next float-right mt-4">
                                        Create an account
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of section center-1 -->
</main>
