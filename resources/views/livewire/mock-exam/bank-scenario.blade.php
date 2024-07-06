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

                <h3 class="mt-4">{{ $mockExam->name }}</h3>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div id="accordion">
            @foreach ($mockExam->bankScenarios as $key => $bank)
                <div class="card">
                    <div class="card-header pl-0" id="heading{{ $key }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $key }}"
                                aria-expanded="true" aria-controls="collapse{{ $key }}">
                                Question Bank {{ $bank->number }}
                            </button>
                        </h5>
                    </div>
        
                    <div id="collapse{{ $key }}" class="collapse @if ($key == 0) show @endif" aria-labelledby="heading{{ $key }}"
                        data-parent="#accordion">
                        <div class="card-body">
                            <div class="row pl-3">
                                <div class="col-md-4 rounded">
                                    <h5 class="text-dark">Questions</h5>
                                    <hr>
                                    <div class="pl-2">{!! $bank->question !!}</div>
                                </div>
                                <div class="col-md-4 ">
                                    <h5>Answers</h5>
                                    <hr>
                                    <div class="pl-2">{!! $bank->answer !!}</div>
                                </div>
                                <div class="col-md-4    ">
                                    <h5>Notes</h5>
                                    <hr>
                                    <div class="pl-2">{!! $bank->notes !!}</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        

    </div>
</div>
