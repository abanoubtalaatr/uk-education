@php
    use Outl1ne\NovaSettings\NovaSettings;
@endphp
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
                    <h2 class="text-white">
                      <img height="60" src="{{ asset('storage/' . NovaSettings::getSetting('logo')) }}" alt="Logo">

                    </h2>
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
                    <a href="{{route('pages', 'about-us')}}">About</a>
                    <a href="{{route('contact-us')}}">Contact</a>
                    <a href="{{route('pages','privacy-policy')}}">Privacy</a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-md-5 p-right-none">
              <div class="center-form center-form-2">
                <h3>Verify your identity</h3>

                <ul class="verify-msg">
                  <li>
                    <img
                      src="{{asset('assets/images/verfi.png')}}"
                      alt=""
                      class="float-left pt-2"
                    />
                    <p>
                      Enter the code we sent to your email ending in
                      <span class="text-info">****@gmail.com</span>.
                    </p>
                  </li>
                </ul>
                @if(isset($message))
                <div class="alert alert-info">{{$message}} </div>
                @endif
                <div class="center-form-input center-form-input-2">
                  <form>
                    <div class="row">
                      <input
                      wire:model='number1'
                        type="text"
                        class="form-control form-control-2"
                        id="fNumber"
                      />
                      <input
                      wire:model='number2'
                        type="text"
                        class="form-control form-control-2"
                        id="fNumber"
                      />
                      <input
                      wire:model='number3'
                        type="text"
                        class="form-control form-control-2"
                        id="fNumber"
                      />
                      <input
                      wire:model='number4'
                        type="text"
                        class="form-control form-control-2"
                        id="fNumber"
                      />
                    </div>
                    <button wire:click='resendCode' type="button" class="btn btn-link text-primary">Resend Code</button>

                    <button

                    wire:click='verifyCode'
                    type="button"
                      class="btn btn-next mtop-big float-right mright-small"
                      
                    >
                      Verify Code
                    </button>
                  </form>
                </div>
                <div class="clr"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End of section center-1 -->
  </main>