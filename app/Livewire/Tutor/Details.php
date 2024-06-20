<?php

namespace App\Livewire\Tutor;

use App\Models\Tutor;
use App\Models\User;
use Livewire\Component;

class Details extends Component
{
    public $tutor, $courses, $mockExams, $crashCourses, $subscriptions;

    public function mount(Tutor $tutor)
    {
        $this->tutor = $tutor;
        $this->courses = $tutor->courses()->limit(2)->get();
        $this->mockExams = $tutor->mockExams()->limit(2)->get();
        $this->crashCourses = $tutor->crashCourses()->limit(2)->get();
        $this->subscriptions = $tutor->subscriptions()->limit(2)->get();
    }   

    public function render()
    {
        return view('livewire.tutor.details')->layout('app');
    }
}
