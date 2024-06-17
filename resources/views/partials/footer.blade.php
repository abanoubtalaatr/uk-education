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
            <h3>LOGO</h3>
          </div>
          <ul class="footer-menu-1">
            <li><a href="{{route('pages', 'terms')}}">Term of Use</a></li>
            <li><a href="{{route('pages','privacy-policy')}}">Privacy Policy</a></li>
            <li><a href="{{route('pages', 'about-us')}}">About</a></li>
            <li><a href="{{route('contact-us')}}">Contact</a></li>
            <li class="float-right social-footer">
              <a href="https://www.linkedin.com/"
                ><i class="fab fa-linkedin-in"></i
              ></a>
              <a href="https://web.whatsapp.com/"
                ><i class="fab fa-whatsapp"></i
              ></a>
              <a href="https://www.facebook.com/"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a href="https://twitter.com/"
                ><i class="fab fa-twitter"></i
              ></a>
              <a href="https://instagram.com/"
                ><i class="fab fa-instagram"></i
              ></a>
              <a href="https://youtube.com/"
                ><i class="fab fa-youtube"></i
              ></a>
            </li>
          </ul>
          <ul class="footer-menu-2">
            <li><a href="#">+91-720-80-99-369</a></li>
            <li><a href="#">email@gmail.com</a></li>
            <li><a href="#">KSA, Dammam</a></li>
            <li class="float-right copy-right-footer">
              <a href="#">@copyright-2024,All Rights Reserved2020</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div>