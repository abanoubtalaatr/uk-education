<div>
    @include('partials.nav-header')
    <div class="add-2">
        <div class="container-fluid y-side">
            <div class="row">
                <div class="col-md-12">
                    <div class="head-path ml-none">
                        <ul class="path-menu">
                            <li><a href="#"><i class="fas fa-home"></i> Home &gt;</a></li>
                            <li><a href="#"><i class="fas fa-book"></i> Courses &gt;</a></li>
                            <li><a href="{{ route('courses.show', $course->id) }}"><i class="fas fa-info-circle"></i>
                                    {{ $course->name }}</a></li>
                        </ul>
                        <hr>
                        <h3 class="my-3"><i class="fas fa-chalkboard-teacher"></i> {{ $course->name }}</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="course-details">
                        <hr>
                        <p><i class="fas fa-align-left"></i> {!! $course->description !!}</p>
                        <hr>
                        <p><i class="fas fa-calendar-alt"></i> {{ $course->date }}</p>
                        <hr>
                        <p><i class="fas fa-dollar-sign"></i> {{ $course->price }}</p>
                        <hr>
                            @livewire('book-now-component', ['bookable_id' => $course->id, 'bookable_type' => "App\Models\Course"])

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
