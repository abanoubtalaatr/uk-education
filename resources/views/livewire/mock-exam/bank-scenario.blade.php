<div>
    @include('partials.nav-header')
    <div class="container">
    <div class="col-md-12">
        <div class="head-path ml-none">
            <ul class="path-menu">
                <li><a href="#">Home ></a></li>
                <li><a href="#">Mock ></a></li>
                <li><a href="#">{{ $mockExam->name }} </a></li>
            </ul>

            <h3>{{ $mockExam->name }}</h3>
        </div>
    </div>
</div>
    <div class="container pb-5">

        <div id="accordion">
            @foreach ($mockExam->bankScenarios as $key=> $bank)
            <div class="card">
                <div class="card-header" id="heading{{$key}}">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$key}}"
                            aria-expanded="true" aria-controls="collapse{{$key}}">
                            {{$bank->number}}
                        </button>
                    </h5>
                </div>

                <div id="collapse{{$key}}" class="collapse @if($key== 0) show @endif " aria-labelledby="heading{{$key}}" data-parent="#accordion">
                    <div class="card-body mr-3">
                      {!! $bank->content !!}
                    </div>
                </div>
            </div>
                
            @endforeach
            
        </div>
    </div>
</div>
