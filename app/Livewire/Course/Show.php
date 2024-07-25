<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class Show extends Component
{
    public $course, $settings, $bookable_id, $bookable_type;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->bookable_id = $course->id;
        $this->bookable_type = "App\Models\Course";
    }
    
    public function render()
    {
        return view('livewire.course.show')->layout('app');
    }
}
