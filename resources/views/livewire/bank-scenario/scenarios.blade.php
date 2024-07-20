<div>
    <div>
        @include('partials.nav-header')
        <div class="container mt-4">
            <div class="col-md-12">
                <div class="head-path ml-none">
                    <ul class="path-menu list-inline">
                        <li class="list-inline-item"><a href="#">Home ></a></li>
                        <li class="list-inline-item"><a href="#">Mock ></a></li>
                        <li class="list-inline-item"><a href="#">Bank Scenario ></a></li>
                        <li class="list-inline-item"><a href="#">{{ $scenario->name }} </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container pb-5">
            <div class="container">
                <div class="scenario-container">
                    <h3 class="scenario-title">{{ $scenario->number }} - {{ $scenario->name }}</h3>
                    
                    <div class="question-section">
                        <h4 class="section-title">Question</h4>
                        <p class="scenario-question pl-4">- {{ $scenario->question }}</p>
                    </div>

                    @if (!request()->input('instructions'))
                        <div class="answer-section collapse-content">
                            <h4 class="section-title">Answer</h4>
                            <h3 class="scenario-answer pl-1">  {!! $scenario->answer !!}</h3>
                        </div>
                        <div class="approach-section collapse-content">
                            <h4 class="section-title">Approach</h4>
                            <h3 class="scenario-approach pl-2">{!! $scenario->approach !!}</h3>
                        </div>
                        <div class="notes-section collapse-content">
                            <h4 class="section-title">Notes</h4>
                            <p class="scenario-notes pl-2">{!! $scenario->notes !!}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .head-path {
            padding: 15px 0;
        }

        .path-menu li a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .path-menu li a:hover {
            text-decoration: underline;
        }

        .scenario-container {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .scenario-title {
            font-size: 24px;
            color: #343a40;
            margin-bottom: 20px;
        }

        .question-section, .answer-section, .approach-section, .notes-section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 20px;
            color: #17a2b8;
            margin-bottom: 10px;
        }

        .scenario-question {
            font-size: 18px;
            color: #495057;
        }

        .scenario-answer, .scenario-approach {
            font-size: 18px;
            color: #28a745;
        }

        .scenario-notes {
            font-size: 16px;
            color: #6c757d;
        }

        .collapse-content {
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            margin-top: 20px;
        }

        .text-primary {
            color: #007bff !important;
        }

        .text-muted {
            color: #6c757d !important;
        }
    </style>
</div>
