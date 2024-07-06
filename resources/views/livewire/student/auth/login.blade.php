<main>
    <!-- start of section center-1 -->
    <section class="center-1 forgot-password">
      <div class="center-overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-7 p-none">
              <div class="card-login white">
                <a href="/">
                <img class="my-4" height="60" width="100" src=" {{asset('storage/'. $settings['logo'])}}" alt="Logo ">
              </a>
                <form>
                  <div class="form-group">
                    <input
                    wire:model="email"
                      type="text"
                      class="form-control"
                      id="email"
                      placeholder="Email"
                    />
                    @error($email)
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input
                    wire:model="password"
                      type="password"
                      class="form-control"
                      id="password"
                      placeholder="Password"
                    />
                    @error($password)
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <a
                    href="{{route('auth.email', 'student')}}"
                    class="float-left top resend"
                  >
                    Forgot password?</a
                  >
                  </div>
                  <button
                  wire:click="login"
                    type="button"
                    class="btn btn-next float-right top mright-small"
                  >
                    Login
                  </button>
                  @if (isset($message))
                  <div class=" form-group alert alert-danger text-end">{{$message}}</div>

                  @endif

                </form>
                <div class="clr"></div>
                
              </div>
            </div>
            <div class="col-md-5 p-none">
              <div class="margin-contain">
                <div class="card-login blue">
                  <h3>Login into your account as Student</h3>
                  <p>
                    Sed ut perspiciatis unde omnis istpoe natus error sit
                    voluptatem accusantium doloremque eopsloi laudantium
                  </p>
                  <ul class="sign-as">
                    
                    
                  </ul>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End of section center-1 -->
  </main>