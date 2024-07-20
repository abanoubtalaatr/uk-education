<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;

class Show extends Component
{
    public $course, $settings, $plabCourse, $courseContent, $whoTheCourseFor, $courseAims, $courseLearningObjectives, $courseLearningOutcomes;

    public function mount(Course $course)
    {
        $this->course = $course;
     
    }
    
    public function render()
    {
        return view('livewire.course.show')->layout('app');
    }
}
