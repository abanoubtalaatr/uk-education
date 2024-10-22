<div class="top-coaches new-bg-top-couch">

  <div class="container-fluid y-side">
          <div class="head-coach text-center">
      <h3>Our Top Tutors</h3>
    </div>
    <div class="responsive">
      @foreach ($tutors as $tutor)
  <div class="col mb-4">
    <div class="card card-couch-new">
    <img src="{{asset('storage/'. $tutor->photo)}}" alt="" class="img-fluid" />
        <div class="layer"></div>
        <a href="{{route('tutors.details', $tutor->id)}}">
          <h5 class="c-name">{{$tutor->name}}</h5>
        </a>
        <h6 class="sub-name mt-2">{{Str::limit($tutor->about, 30)}}</h6>
      </div>
  </div>
      @endforeach
      
      
    </div>
  </div>
</div>

    <style>
.card-couch-new {
  width: 100% !important;
    border-radius: 15px !important;
  height: 300px !important;
}
.layer {
    width: 100%;
  height: 300px !important;
    position: absolute;
    border-radius: 15px !important;
        background: #0000004f;
}
.card-couch-new .img-fluid {
  width: 100%;
  border-radius: 5%;
  height: 55vh;
}
.sub-name{
    margin-top: 0px !important;
    position: absolute;
    bottom: 60px;
        margin-bottom: 0px;

}
    </style>