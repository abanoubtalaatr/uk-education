<div>
    @include('partials.nav-header')
    <div class="container-fluid y-side">
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
        <div class="container">
            
            @foreach ($mockExam->scenarios()->latest()->get() as $key => $scenario)
                <div class="row border pt-4 pb-4 my-2 rounded">
                    <div class="col-3">
                        {{$scenario->number}} -  {{$scenario->name}}
                    </div> 
                    <div class="col-9 d-flex">
                        <div class="col-4">
                            <a href="{{ route('bank-scenario.scenarios', ['scenario' => $scenario->id, 'instructions' => 'true']) }}" target="_blank" class="btn btn-primary">Student Instructions</a>
                        </div>
                        <div class="col-4">
                            <a href="{{ route('bank-scenario.scenarios', ['scenario' => $scenario->id]) }}" target="_blank" class="btn btn-primary">Full Instructions</a>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
        

    </div>
</div>
