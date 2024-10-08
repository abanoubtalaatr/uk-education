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
                      <img height="80" src="{{ asset('storage/' . NovaSettings::getSetting('logo')) }}" alt="Logo">

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
              <div class="center-form center-form-2 center-form-22">
                <h3>Please send us your email</h3>
                <p>
                  don't warry we will email you a link to create your new
                  password
                </p>
                @if(isset($message))
                <div class="alert alert-info">{{$message}}</div>
                @endif
                

                <div class="center-form-input center-form-input-2">
                  <form>
                    <div class="form-group">
                      <input
                      wire:model='email'
                        type="email"
                        class="form-control"
                        id="userEmail"
                        placeholder="Email"
                      />
                      @error('email')
                        <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <button wire:click='send' type="button" class="btn btn-link">Resend</button>
                    <button wire:click='send' type="button" class="btn btn-next mtop-big float-right">
                      Send
                      </button
                    >
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