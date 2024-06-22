<div class="subscrib">
    <div class="container-flyid y-side-big">
      <div class="row sub-back">
        <div class="col-md-5">
          <div class="sub-info">
            <h3>Subscribe Our Newsletter</h3>
            <p>
              Sed ut perspiciatis unde omnis istpoe natus error sit
              voluptatem accusantium doloremque eopsloi laudantium
            </p>
          </div>
        </div>
        <div class="col-md-7">
          <form class="row sub-form" action="{{ route('news_letter.store') }}" method="POST">
            @csrf
            <div class="form-group col-md-9">
                <input type="email" required class="form-control form-control-4" id="YourEmail" name="email" placeholder="Your Email">
            </div>
            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-sub">Subscribe</button>
            </div>
        </form>
        
        </div>
      </div>
    </div>
  </div>