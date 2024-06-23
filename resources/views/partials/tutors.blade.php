<div class="top-coaches new-bg-top-couch">
  <div class="container-fluid y-side">
    <div class="head-coach ml-4">
      <h3>Our Top Tutors</h3>
    </div>
  </div>
  <div class="container-fluid y-side">
    <div class="responsive">
      @foreach ($tutors as $tutor)
      
      <div class="coach-profile">
        
        <img src="{{asset('storage/'. $tutor->photo)}}" alt="" class="img-fluid" />
        <a href="{{route('tutors.details', $tutor->id)}}">
          <h5 class="c-name">{{$tutor->name}}</h5>
        </a>
        <h6 class="sub-name mt-2">{{Str::limit($tutor->about, 30)}}</h6>

        <div class="coach-layout">&nbsp;</div>
      </div>  
      @endforeach
      
      
    </div>
  </div>
</div>