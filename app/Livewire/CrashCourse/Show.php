<?php

namespace App\Livewire\CrashCourse;

use App\Models\CrashCourse;
use Livewire\Component;

class Show extends Component
{
    public $crashCourse;

    public function mount(CrashCourse $crash_course)
    {
        $this->crashCourse = $crash_course;
    }
    public function render()
    {
        return view('livewire.crash-course.show')->layout('app');
    }
}
