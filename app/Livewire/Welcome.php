<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class Welcome extends Component
{
    public $courses, $tutors;

    public function mount()
    {
        $this->courses = Course::query()->get();
        $this->tutors = \App\Models\Tutor::query()->get();
    }

    public function render()
    {
        
        return view('livewire.welcome')->layout('app', ['title' => 'Welcome']);
    }
}
