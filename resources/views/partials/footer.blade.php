@php 
    use Outl1ne\NovaSettings\NovaSettings;
    @endphp
<div>
  @include('partials.subscribe')
  <footer class="footer">
    <div class="logo-footer">
      <img src="{{asset('assets/images/logo-footer.png')}}" alt="" class="img-fluid" />
    </div>
    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="logo-dark float-left">
            <img src="{{asset('storage/'. NovaSettings::getSetting('logo'))}}" alt="" class="img-fluid" />
          </div>
          <ul class="footer-menu-1">
            <li><a href="{{route('pages', 'terms')}}">Term of Use</a></li>
            <li><a href="{{route('pages','privacy-policy')}}">Privacy Policy</a></li>
            <li><a href="{{route('pages', 'about-us')}}">About</a></li>
            <li><a href="{{route('contact-us')}}">Contact</a></li>
            <li class="float-right social-footer">
              <a target="_blank" href="{{ NovaSettings::getSetting('linkedin') }}">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a target="_blank" href="{{ 'https://wa.me/' . NovaSettings::getSetting('whats_app_number') }}">
                <i class="fab fa-whatsapp"></i>
              </a>
              <a target="_blank" href="{{ NovaSettings::getSetting('facebook') }}">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a target="_blank" href="{{ NovaSettings::getSetting('twitter') }}">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" href="{{ NovaSettings::getSetting('instagram') }}">
                <i class="fab fa-instagram"></i>
              </a>
              <a target="_blank" href="{{ NovaSettings::getSetting('youtube') }}">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            
          </ul>
          <ul class="footer-menu-2">
            <li><a href="#"> {{ NovaSettings::getSetting('mobile')}}</a></li>
            <li><a href="#">{{ NovaSettings::getSetting('email')}}</a></li>
            <li><a href="#">{{ NovaSettings::getSetting('address')}}</a></li>
            <li class="float-right copy-right-footer">
              <a href="#">@copyright-2024, All Rights Reserved by <a href="" style="font-weight: 900">Digital vision solutions</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div>