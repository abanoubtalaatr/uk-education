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
                    <h2 class="text-white">LOGO</h2>
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
                    <a href="index.html">Home</a>
                    <a href="About.html">About</a>
                    <a href="contact-us.html">Contact</a>
                    <a href="privacy-policy.html">Privacy</a>
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
                <div class="alert alert-info">{{$message}} </div>
                @endif
                <div class="center-form-input center-form-input-2">
                  <form>
                    <div class="form-group">
                      <input
                      wire:model="password"
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Create new Password"
                      />
                      
                    </div>
                    <div class="form-group">
                      <input
                       wire:model="password_confirmation"
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Confirm Password"
                      />
                      @error($password)
                        <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>

                    <button wire:click="resetPassword" type="button" class="btn btn-next mtop-big float-right">save</button>
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