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
                                        <input type="file" id="examConfirmationEmailInput" class="form-control-file" wire:model="examConfirmationEmail" />
                                        <progress id="examConfirmationEmailProgress" max="100" value="0"></progress>
                                        @if ($examConfirmationEmailUrl)
                                            <img height="90" width="120" src="{{ $examConfirmationEmailUrl }}" alt="Exam Confirmation Email" class="img-fluid" />
                                        @endif
                                        @error('examConfirmationEmail') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>First Upload Exam Confirmation Image</label>
                                        <input type="file" id="examConfirmationOneInput" class="form-control-file" wire:model="examConfirmationOne" />
                                        <progress id="examConfirmationOneProgress" max="100" value="0"></progress>
                                        @if ($examConfirmationOneUrl)
                                            <img src="{{ $examConfirmationOneUrl }}" alt="First Confirmation Image" class="img-fluid" />
                                        @endif
                                        @error('examConfirmationOne') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Second Upload Exam Confirmation Image</label>
                                        <input type="file" id="examConfirmationTwoInput" class="form-control-file" wire:model="examConfirmationTwo" />
                                        <progress id="examConfirmationTwoProgress" max="100" value="0"></progress>
                                        @if ($examConfirmationTwoUrl)
                                            <img src="{{ $examConfirmationTwoUrl }}" alt="Second Confirmation Image" class="img-fluid" />
                                        @endif
                                        @error('examConfirmationTwo') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            // Initialize upload progress tracking for each file input
                                            setupFileUploadWithProgress('examConfirmationEmailInput', 'examConfirmationEmailProgress');
                                            setupFileUploadWithProgress('examConfirmationOneInput', 'examConfirmationOneProgress');
                                            setupFileUploadWithProgress('examConfirmationTwoInput', 'examConfirmationTwoProgress');
                                        });
                                    
                                        function setupFileUploadWithProgress(inputId, progressId) {
                                            const inputElement = document.getElementById(inputId);
                                            const progressElement = document.getElementById(progressId);
                                    
                                            inputElement.addEventListener('change', function (event) {
                                                const file = event.target.files[0];
                                                if (!file) return;
                                    
                                                const xhr = new XMLHttpRequest();
                                                const formData = new FormData();
                                    
                                                formData.append(inputElement.getAttribute('wire:model'), file);
                                    
                                                xhr.upload.addEventListener('progress', function (e) {
                                                    if (e.lengthComputable) {
                                                        const percentComplete = (e.loaded / e.total) * 100;
                                                        progressElement.value = percentComplete;
                                                    }
                                                });
                                    
                                                xhr.open('POST', '/livewire/upload-file', true);
                                                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                                    
                                                xhr.onload = function () {
                                                    if (xhr.status === 200) {
                                                        progressElement.value = 100;
                                                        Livewire.emit('fileUploaded', inputElement.getAttribute('wire:model'), xhr.responseText);
                                                    } else {
                                                        console.error('Upload failed');
                                                    }
                                                };
                                    
                                                xhr.send(formData);
                                            });
                                        }
                                    </script>
                                    
                                    
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
    <script>
        Livewire.on('upload:progress', progress => {
            @this.set('uploadProgress', progress);
        });
    </script>
    
    <!-- End of section center-1 -->
</main>
