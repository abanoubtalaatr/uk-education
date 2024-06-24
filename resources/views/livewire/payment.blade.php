<div>
    @include('partials.nav-header')
    <main>
        <!-- start add cours -->
        <div class="add-2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="head-path ml-none">
                  <ul class="path-menu">
                    <li><a href="#">Home ></a></li>
                    <li><a href="#">Favorites > </a></li>
                    <li><a href="#">Payment </a></li>
                  </ul>
                  <h3>Booking and Payment</h3>
                </div>
              </div>
              <div class="col-md-12 top-med">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row border-payment">
                      <h3>Enter Contact Details</h3>
                      <form class="top-med w-100">
                        <div class="row">
                          <div class="col">
                            <label for="userFirstName"> First name</label>
  
                            <input
                              type="text"
                              class="form-control form-control-5"
                            />
                          </div>
                          <div class="col">
                            <label for="userLasttName"> Last name</label>
  
                            <input
                              type="text"
                              class="form-control form-control-5"
                            />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="Email1">Email address</label>
  
                          <input
                            type="email"
                            class="form-control form-control-5"
                            id="Email1"
                            aria-describedby="emailHelp"
                          />
                        </div>
                        <h6>Phone number</h6>
  
                        <div class="input-group mb-4">
                          <div class="input-group-prepend">
                            <button
                              class="btn btn-outline-secondary dropdown-toggle"
                              type="button"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <img
                                src="assets/images/flag.png"
                                class="img-fluid"
                                alt=""
                              />
                              +966
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#"
                                >Something else here</a
                              >
                              <div
                                role="separator"
                                class="dropdown-divider"
                              ></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </div>
                          <input
                            type="text"
                            class="form-control form-control-5"
                            aria-label="Text input with dropdown button"
                          />
                        </div>
                        <h3 class="mt-3 mb-3">
                          How would you like to complete your payment?
                        </h3>
  
                        <div
                          class="custom-control custom-radio custom-control-inline my-3"
                        >
                          <input
                            type="radio"
                            id="customRadioInline1"
                            name="customRadioInline1"
                            class="custom-control-input pt-3"
                          />
                          <label
                            class="custom-control-label"
                            for="customRadioInline1"
                          >
                            Credit Card
                          </label>
                          <img
                            src="assets/images/visa.png"
                            class="img-visa"
                            alt=""
                          />
                        </div>
                        <div
                          class="custom-control custom-radio custom-control-inline my-3"
                        >
                          <input
                            type="radio"
                            id="customRadioInline2"
                            name="customRadioInline1"
                            class="custom-control-input"
                          />
                          <label
                            class="custom-control-label"
                            for="customRadioInline2"
                            >other Option
                          </label>
                        </div>
                        <div class="row">
                          <div class="col">
                            <label for="cardName">name on card</label>
  
                            <input
                              type="text"
                              class="form-control form-control-5"
                            />
                          </div>
                          <div class="col">
                            <label for="cardNumber">Credit Card number</label>
  
                            <input
                              type="text"
                              class="form-control form-control-5"
                            />
                          </div>
                        </div>
                        <h6>Expire Date</h6>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <select class="form-control form-control-5">
                                <option selected>City</option>
                                <option>Default select</option>
                                <option>Default select</option>
                              </select>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <select class="form-control form-control-5">
                                <option selected>City</option>
                                <option>Default select</option>
                                <option>Default select</option>
                              </select>
                            </div>
                          </div>
                          <div class="col">
                            <input
                              type="text"
                              class="form-control form-control-5"
                            />
                          </div>
                        </div>
                        <button type="submit" class="btn btn-now-2 mr-left-none">
                          Booking Now
                        </button>
                      </form>
                    </div>
                  </div>
  
                  <div class="col-md-4">
                    <div class="total">
                      <div class="total-info">
                        <h3>Total</h3>
                        <h4>211 $</h4>
                        <h5 class="top-sm">
                          {{-- Old Price <span class="float-right">250 $</span> --}}
                        </h5>
                        {{-- <h6>Offer <span class="float-right"> 5% off</span></h6> --}}
                        {{-- <h6>
                          Vat
                          <img
                            src="assets/images/warning.png"
                            alt=""
                            class="pl-2"
                          />
                          <span class="float-right">2 %</span>
                        </h6> --}}
                      </div>
                      <div class="total-end top-sm">
                        <div class="row">
                          <div class="col-md-12">
                            <h3 class="payment-for">You Payment for</h3>
                          </div>
                          <div class="col-md-4">
                            <div class="product-container mt-4">
                              <img
                                src="assets/images/B-1.png"
                                alt=""
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="end-info">
                              <h6>UX Design</h6>
                              <p>Coaches Name</p>
                              <p>
                                Remote <span class="float-right">980 $</span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <!-- start subscrib -->

      </main>
      @include('partials.footer')
</div>