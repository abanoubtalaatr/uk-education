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
                        <hr>
                        <h3 class="my-3"><i class="fas fa-chalkboard-teacher"></i> {{ $crashCourse->name }}</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="course-details">
                        <hr>
                        <p><i class="fas fa-align-left"></i> {!! $crashCourse->description !!}</p>
                        <hr>
                        <p><i class="fas fa-calendar-alt"></i> {{ $crashCourse->date }}</p>
                        <hr>
                        <p><i class="fas fa-dollar-sign"></i> {{ $crashCourse->price }}</p>
                        <hr>
                        <button class="btn btn-join"><i class="fas fa-ticket-alt"></i> Book now</button>
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
