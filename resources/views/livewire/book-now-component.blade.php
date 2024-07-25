<div>
    
    @if (\App\Services\UserTypeService::isAuth())
        @if (\App\Services\UserTypeService::isStudent())
            <button wire:click="bookNow" class="btn btn-join"><i class="fas fa-ticket-alt"></i> {{$buttonName}}</button>
        @endif
    @else
        @if (\App\Services\UserTypeService::isTutor())
            <a href="{{ route('student-register') }}" class="btn btn-join"><i class="fas fa-ticket-alt"></i> Join now<a>
                    <a href="{{ route('student-login') }}" class="btn btn-join"><i class="fas fa-ticket-alt"></i> Login as
                        student<a>
        @endif
    @endif
</div>
