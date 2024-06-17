<div>
    @include('partials.nav-header')
<main>
    <!-- start add cours -->
    <div class="add-2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="head-path ml-none">
              <h3>Your Account information</h3>
            </div>
          </div>
          <div class="col-md-12 top">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a
                  class="nav-item nav-link mx-2 mb-3 active"
                  id="nav-home-tab"
                  data-toggle="tab"
                  href="#nav-home"
                  role="tab"
                  aria-controls="nav-home"
                  aria-selected="true"
                  >Personal Data</a
                >
                <a
                  class="nav-item nav-link mx-2 mb-3 "
                  id="nav-profile-tab"
                  data-toggle="tab"
                  href="#nav-profile"
                  role="tab"
                  aria-controls="nav-profile"
                  aria-selected="false"
                  >Subscription</a
                >
                <a
                  class="nav-item nav-link mx-2 mb-3 "
                  id="nav-contact-tab"
                  data-toggle="tab"
                  href="#nav-contact"
                  role="tab"
                  aria-controls="nav-contact"
                  aria-selected="false"
                  >Courses
                </a>
                <a
                  class="nav-item nav-link mx-2 mb-3 "
                  id="nav-contact-2-tab"
                  data-toggle="tab"
                  href="#nav-contact-2"
                  role="tab"
                  aria-controls="nav-contact-2"
                  aria-selected="false"
                  >Mock Exam
                </a>
                <a
                  class="nav-item nav-link mx-2 mb-3 last "
                  id="nav-contact-3-tab"
                  data-toggle="tab"
                  href="#nav-contact-3"
                  role="tab"
                  aria-controls="nav-contact-3"
                  aria-selected="false"
                  >Crash Courses
                </a>
                <a
                  class="nav-item nav-link mx-2 mb-3 last"
                  id="nav-contact-4-tab"
                  data-toggle="tab"
                  href="#nav-contact-4"
                  role="tab"
                  aria-controls="nav-contact-4"
                  aria-selected="false"
                  >Available Time
                </a>
                <a
                  class="nav-item nav-link mx-2 mb-3 last"
                  id="nav-contact-5-tab"
                  data-toggle="tab"
                  href="#nav-contact-5"
                  role="tab"
                  aria-controls="nav-contact-5"
                  aria-selected="false"
                  >Calender
                </a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <!-- start first tab -->
              <div
                class="tab-pane fade show active"
                id="nav-home"
                role="tabpanel"
                aria-labelledby="nav-home-tab"
              >
                <div class="row top">
                  <div class="col-md-6">
                    <div class="info">
                      <h3>Personal Data</h3>
                      <div class="up-img top-med">
                        <input
                          type="file"
                          class="imgpo"
                          onchange="readURLL(this);"
                        />
                        <span class="file-hover">Change </span>
                        <img
                          id="blah"
                        src="{{asset('assets/images/avatar.jpg')}}"
                          alt=""
                          class="img-fluid"
                        />
                      </div>

                      <form class="top-med">
                        <div class="form-group">
                          <input
                          wire:model="information.name"
                            type="name"
                            class="form-control"
                            id="userEmail"
                            placeholder="name"
                          />
                        </div>
                        
                        <div class="form-group">
                          <input
                          wire:model="information.email"
                            type="email"
                            class="form-control"
                            id="userEmail"
                            placeholder="Your Email"
                          />
                        </div>
                        <div class="form-group">
                          <input
                          wire:model="information.mobile"
                            type="number"
                            class="form-control"
                            id="userphone"
                            placeholder="phone number"
                          />
                        </div>
                        <div class="form-group">
                          <input
                          wire:model="information.whats_app_number"
                            type="number"
                            class="form-control"
                            id="whatsappNumber"
                            placeholder="whatsapp number"
                          />
                        </div>
                        <button
                        wire:click="updateProfile"
                          type="button"
                          class="btn btn-next float-right my-4"
                        >
                          Save Change
                        </button>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="info">
                      <h3>Change Password</h3>
                      <form class="top-med">
                        <div class="form-group mt-5">
                          <input
                            type="password"
                            class="form-control"
                            id="oldPassword"
                            placeholder=" Old Password"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="password"
                            class="form-control"
                            id="NewPassword"
                            placeholder=" New Password"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="password"
                            class="form-control"
                            id="rePassword"
                            placeholder=" Retype Password"
                          />
                        </div>
                        <button
                          type="submit"
                          class="btn btn-next float-right mt-4"
                        >
                          Save Change
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- start second tab -->
              <div
                class="tab-pane fade "
                id="nav-profile"
                role="tabpanel"
                aria-labelledby="nav-profile-tab"
              >
                <div class="row">
                  <div class="col-md-12 top-sm-2">
                    <div class="package-head ml-none">
                      <div class="list float-right">
                        <span>({{$subscriptions->count()}}) in the list</span>
                      </div>
                      <h3>Subscription</h3>
                    </div>
                  </div>

                  @foreach ($subscriptions as $subscription)
                  <div class="col-md-12  border-attend">
                    <div class="row search-top">
                      <div class="col-md-4">
                        <div class="result-image">
                          <img
                          height="160"
                          src="{{ asset('storage/' . $subscription->image) }}"
                          alt=""
                            class="img-fluid"
                          />
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="result">
                          <div class="result-confirm float-right mr-4">
                            <h4 class="pr-2 pb-2">{{$subscription->price}} $</h4>
                            <a
                              href="#"
                              class="btn btn-join ser-btn float-right"
                              >More Detail's
                            </a>
                          </div>
                          <div class="result-info">
                            <h3>{{$subscription->name}}</h3>
                            
                            <p>
                              {{$subscription->description}}
                            </p>
                            <p class="float-left mr-3 n-attend">
                              Number of attendees:
                              <span class="ateend-dark">
                                {{ \App\Services\SubscriptionService::getTotalStudentsInSubscriptionByTutor($subscription, auth('tutor')->id())}} people
                              </span>
                            </p>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  
                  
                </div>
              </div>

              <!-- start third tab -->
              <div
                class="tab-pane fade "
                id="nav-contact"
                role="tabpanel"
                aria-labelledby="nav-contact-tab"
              >
                <div class="row">
                  <div class="col-md-12 top-sm-2">
                    <div class="package-head ml-none">
                      <div class="list float-right">
                        <span>({{$courses->count()}}) in the list</span>
                      </div>
                      <h3>Courses</h3>
                    </div>
                  </div>

                  @foreach ($courses as $course)
                  <div class="col-md-12  border-attend">
                    <div class="row search-top">
                      <div class="col-md-4">
                        <div class="result-image">
                          <img
                          height="160"
                          src="{{ asset('storage/' . $course->image) }}"
                          alt=""
                            class="img-fluid"
                          />
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="result">
                          <div class="result-confirm float-right mr-4">
                            <h4 class="pr-2 pb-2">{{$course->price}} $</h4>
                            <a
                              href="#"
                              class="btn btn-join ser-btn float-right"
                              >More Detail's
                            </a>
                          </div>
                          <div class="result-info">
                            <h3>{{$course->name}}</h3>
                            <h3>{{$course->date}}</h3>
                            
                            <p>
                              {{$course->description}}
                            </p>
                            <p class="float-left mr-3 n-attend">
                              Number of attendees:
                              <span class="ateend-dark">
                                {{ \App\Services\CourseService::getTotalStudentsInCourseByTutor($subscription, auth('tutor')->id())}} people
                              </span>
                            </p>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  
                </div>
              </div>

              <!-- start forth tab -->
              <div
                class="tab-pane fade "
                id="nav-contact-2"
                role="tabpanel"
                aria-labelledby="nav-contact-2-tab"
              >
                <div class="row">
                  <div class="col-md-12 top-sm-2">
                    <div class="package-head ml-none">
                      <div class="list float-right">
                        <span>({{$mockExams->count()}}) in the list</span>
                      </div>
                      <h3>Mock Exams</h3>
                    </div>
                  </div>
                  
                  @foreach ($mockExams as $mock)
                  <div class="col-md-12  border-attend">
                    <div class="row search-top">
                      <div class="col-md-4">
                        <div class="result-image">
                          <img
                          src="{{ asset('storage/' . $mock->image) }}"
                          alt=""
                            class="img-fluid"
                          />
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="result">
                          <div class="result-confirm float-right mr-4">
                            <h4 class="pr-2 pb-2">{{$mock->price}} $</h4>
                            <a
                              href="#"
                              class="btn btn-join ser-btn float-right"
                              >More Detail's
                            </a>
                          </div>
                          <div class="result-info">
                            <h3>{{$mock->name}}</h3>
                            <h3>{{$mock->date}}</h3>
                            
                            <p>
                              {{$mock->description}}
                            </p>
                            <p class="float-left mr-3 n-attend">
                              Number of attendees:
                              <span class="ateend-dark">
                                {{ \App\Services\MockExamService::getTotalStudentsInMockExamByTutor($subscription, auth('tutor')->id())}} people
                              </span>
                            </p>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

              <!-- start 3 tab -->
              <div
                class="tab-pane fade "
                id="nav-contact-3"
                role="tabpanel"
                aria-labelledby="nav-contact-3-tab"
              >
                <div class="row">
                  <div class="col-md-12 top-sm-2">
                    <div class="package-head ml-none">
                      <div class="list float-right">
                        <span>({{$crashCourses->count()}}) in the list</span>
                      </div>
                      <h3>Crash Courses</h3>
                    </div>
                  </div>
                  @foreach ($crashCourses as $crash)
                  <div class="col-md-12  border-attend">
                    <div class="row search-top">
                      <div class="col-md-4">
                        <div class="result-image">
                          <img
                          src="{{ asset('storage/' . $crash->image) }}"
                          alt=""
                            class="img-fluid"
                          />
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="result">
                          <div class="result-confirm float-right mr-4">
                            <h4 class="pr-2 pb-2">{{$crash->price}} $</h4>
                            <a
                              href="#"
                              class="btn btn-join ser-btn float-right"
                              >More Detail's
                            </a>
                          </div>
                          <div class="result-info">
                            <h3>{{$crash->name}}</h3>
                            <h3>{{$crash->date}}</h3>
                            
                            <p>
                              {{$crash->description}}
                            </p>
                            <p class="float-left mr-3 n-attend">
                              Number of attendees:
                              <span class="ateend-dark">
                                {{ \App\Services\CrashCourseService::getTotalStudentsInCrashCourseByTutor($subscription, auth('tutor')->id())}} people
                              </span>
                            </p>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <!-- start 4 tab -->
              <div
                class="tab-pane fade"
                id="nav-contact-4"
                role="tabpanel"
                aria-labelledby="nav-contact-4-tab"
              >
                <div class="row">
                  <div class="col-md-12">
                    <div id="table1" style="display: block">
                      <form
                        id="ccards"
                        class="scrollable-container"
                        method="post"
                      >
                        <table
                          class="table ml-5 mt-5 table-striped table-bordered table-hover table-responsive border-0"
                        >
                          <tbody>
                            <tr>
                              <th>Day</th>
                              <th>Date from:</th>
                              <th>Date to:</th>
                              <th>Time from:</th>
                              <th>Time to:</th>
                            </tr>
                          </tbody>
                          <tbody id="cctable">
                            <tr class="dinput">
                              <td>Sunday</td>
                              <td>
                                <input
                                  class="form-control"
                                  type="date"
                                  value="2020"
                                  id="example-date-input"
                                  name="cc_num[]"
                                  maxlength="4"
                                />
                              </td>
                              <td>
                                <input
                                  class="form-control"
                                  type="date"
                                  value="2020"
                                  id="example-date-input-2"
                                  name="cc_num[]"
                                  maxlength="4"
                                />
                              </td>
                              <td>
                                <input
                                  type="time"
                                  class="form-control"
                                  name="cc_app[]"
                                  maxlength="10"
                                />
                              </td>
                              <td>
                                <input
                                  type="time"
                                  class="form-control"
                                  name="cc_app[]"
                                  maxlength="10"
                                />
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="pl-5">
                          <input
                            type="button"
                            class="btnAdd new-add"
                            value="Add"
                          />
                          <input
                            type="button"
                            class="btnDel remove-add"
                            value="Remove"
                            disabled="disabled"
                          />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- start last one -->
              <div
                class="tab-pane fade"
                id="nav-contact-5"
                role="tabpanel"
                aria-labelledby="nav-contact-5-tab"
              >
                <div id="con-calender" class="calendar-container mt-3"></div>
              </div>
              <!-- End tabs -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- start subscrib -->
    @include('partials.footer')
  </main>

</div>