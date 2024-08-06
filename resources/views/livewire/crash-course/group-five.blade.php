<div>
    @include('partials.nav-header')
    <div class="add-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="head-path ml-none">
                        <ul class="path-menu">
                            <li><a href="#"><i class="fas fa-home"></i> Home &gt;</a></li>
                            <li><a href="#"><i class="fas fa-book"></i> Courses &gt;</a></li>
                            <li><a href="{{ route('crash-courses.show', $crashCourse->id) }}"><i
                                        class="fas fa-info-circle"></i> {{ $crashCourse->name }}</a></li>
                        </ul>
                        
                        {{-- <h3 class="my-3"><i class="fas fa-chalkboard-teacher"></i> {{ $crashCourse->name }}</h3> --}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="course-details">
                        <hr>
                        <p>{{$data['title']}}</p>
                        <p>Price : {{$data['price']}} £</p>
                        <hr>
                        <h4>Instructions</h4>
                        @foreach ($data['group_5_instructions_for_crash_course'] as $content)
                        
                        <div class="p-1 mb-1 bg-light rounded">
                            <p class="mb-0">{{ $content->attributes->instructions }}</p>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .path-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .path-menu li {
            margin-right: 10px;
        }

        .path-menu a {
            text-decoration: none;
            color: #007bff;
        }

        .head-path {
            margin-bottom: 20px;
        }

        .add-2 {
            padding: 20px 0;
        }

        .course-details p {
            margin-bottom: 10px;
        }

        .btn-join {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</div>
