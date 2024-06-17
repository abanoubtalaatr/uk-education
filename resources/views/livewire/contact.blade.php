<div>
    @include('partials.nav-header')
    <main>
        <div class="contact">
            
            <div class="container">
                @if (isset($message))
                <div class="alert alert-success mt-2">
                    {{ $message }} 
                </div>
                @endif
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="head-contact">
                            <h3>Contact Us</h3>
                            <h6 class="mt-5 mb-3">Send Your Message</h6>
                        </div>
                        <form wire:submit.prevent="store">
                            <div class="form-group">
                                <input
                                    wire:model="form.name"
                                    type="text"
                                    class="form-control"
                                    id="UserName"
                                    aria-describedby="nameHelp"
                                    placeholder="Name"
                                />
                                @error('form.name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input
                                    wire:model="form.email"
                                    type="email"
                                    class="form-control"
                                    id="UserEmail"
                                    aria-describedby="emailHelp"
                                    placeholder="Your Email"
                                />
                                @error('form.email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input
                                    wire:model="form.message_type"
                                    type="text"
                                    class="form-control"
                                    id="MsgType"
                                    aria-describedby="msgHelp"
                                    placeholder="Type of Message"
                                />
                                @error('form.message_type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea
                                    wire:model="form.message"
                                    class="form-control"
                                    id="TheMessage"
                                    rows="3"
                                    placeholder="The Message"
                                ></textarea>
                                @error('form.message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button
                                type="submit"
                                class="btn btn-next float-right mt-2 float-none"
                            >
                                Send
                            </button>
                            
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="head-contact ml-5">
                            <h3>Data Contact</h3>
                            <ul class="data-contact">
                                <li>
                                    <h4>
                                        <img src="assets/images/phone-icone.png" alt="" class="pr-3"/>
                                        Phone Number
                                    </h4>
                                    <span class="float-left">+91-720-80-99-369</span>
                                </li>
                                <li>
                                    <h4>
                                        <img src="assets/images/icon-Message.png" alt="" class="pr-3"/>
                                        Email Address
                                    </h4>
                                    <span class="float-left">email@gmail.com</span>
                                </li>
                                <li>
                                    <h4>
                                        <img src="assets/images/Icon-Home.png" alt="" class="pr-3"/>
                                        Address
                                    </h4>
                                    <span class="float-left">KSA, Dammam</span>
                                </li>
                                <li>
                                    <h4>
                                        <img src="assets/images/icon-world.png" alt="" class="pr-3"/>in social Media
                                    </h4>
                                    <span class="float-left social-footer span-data">
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </main>
</div>
