<div class="container mt-5">
  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="find">
        <div class="row">
          <div class="col-md-5 ">
            <div class="find-info">
              <h5>Find Your Course</h5>
            
            </div>
          </div>
          <div class="col-md-7  ">
            <form class="d-flex" action="{{route('all-courses', ['search' => request()->input('search')])}}">
              <div class="w-75 mb-2">
                <input type="text" name="search" class="form-control w-75 form-control-3" id="CoursName" placeholder="Course name">
              </div>
              <div class="w-25">
                <button type="submit" class="btn btn-info p-2"> Search </button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="row">
    <div class="col-md-12">
      <div class="find">
        <div class="row">
          <div class="col-md-5 ">
            <div class="find-info">
              <h5>Find Your Tutor</h5>
            
            </div>
          </div>
          <div class="col-md-7  ">
            <form class="d-flex" action="{{route('all-tutors', ['search' => request()->input('search')])}}">
              <div class="w-75 mb-2">
                <input type="text" name="search" class="form-control w-75 form-control-3" id="Tutor" placeholder="Tutor name">
              </div>
              <div class="w-25">
                <button type="submit"  class="btn btn-info p-2"> Search </button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</div>