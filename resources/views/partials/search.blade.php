<div class="container-fluid y-side minus-mar">
  
    <div class="find">
        <div class="row">
          <div class="col-md-2 input-mobile-width">
            <div class="find-info">
              <h5 class='mb-0'>Find Your</h5>
              <p class='mb-0'>Courses or Tutors</p>
            </div>
          </div>
          <div class="col-md-10">
            <form class="form-inline w-100" action="{{route('all-courses', ['search' => request()->input('search')])}}">
              <div class="form-group form-group-new-width m-1">
                <input type="text" name="search" class="form-control w-100 form-control-3" id="CoursName" placeholder="Course name">
              </div>
  
  
  
                  
                <button type="submit" class="btn btn-info p-2 text-white"> Search </button>
              
            </form>
          </div>
        </div>
      </div>

  {{-- <div class="row">
    <div class="col-md-12">
      <div class="find p-0 p-3">
        <div class="row">
          <div class="col-md-5 ">
            <div class="find-info">
              <h5 class='mb-0'>Find Your Tutor</h5>
            
            </div>
          </div>
          <div class="col-md-7  ">
            <form class="d-flex" action="{{route('all-tutors', ['search' => request()->input('search')])}}">
              <div class="w-75 mb-0">
                <input type="text" name="search" class="form-control w-75 form-control-3" id="Tutor" placeholder="Tutor name">
              </div>
              <div class="w-25">
                <button type="submit"  class="btn btn-info px-4"> Search </button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</div>

<style>
    .form-group-new-width {
  width: 90% !important;
}
.form-control-3 {
  border: 1.5px solid #7070703f !important;
  border-radius: 5px;
  margin-bottom: 0 !important;
  height: 40px;
}
.form-control-3:focus {
  border: 1.5px solid #4d75b8 !important;
  box-shadow: none;
  border-radius: 5px;
}



    
    
    
    
    /* start my Media-Quary *************************************************** ********/
@media(max-width: 600px) {

  .form-control-3 {
    height: 40px;
  }
  .form-group-new-width {
    width: 100% !important;
}
}    
    
</style>