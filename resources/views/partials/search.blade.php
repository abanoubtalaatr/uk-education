  
    <div class=" ">
        <!--minus-mar-->
      <!--  <div class="container-fluid y-side ">-->

    
      <!--</div>-->
          <div class=" find w-100">
     <div class="find-info mb-2">
              <h5 class='mb-0'>Find Your</h5>
              <p class='mb-0'>Courses or Tutors</p>
            </div>
                  <form class="d-flex gap-3" action="{{route('all-courses', ['search' => request()->input('search')])}}">
              <div class="form-group  m-0 mr-2 w-100">
                <input type="text" name="search" class="form-control w-100 form-control-3" id="CoursName" placeholder="Course name" style='height:50px'>
              </div>
  
  
  
                  
                <button type="submit" class="btn btn-info p-2 text-white" style='height:50px;background-color: #3a3c8e;    border: 1px solid transparent;'> Search </button>
              
            </form>
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