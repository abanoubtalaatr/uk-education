<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Outl1ne\NovaSettings\NovaSettings;

class Courses extends Component
{
    use WithPagination;

    public $courses = [],  $settings, $plabCourse, $courseContent, $whoTheCourseFor, $courseAims, $courseLearningObjectives, $courseLearningOutcomes;

    public function mount()
    {
        $this->courses = Course::paginate(15)->items();
        $this->settings = NovaSettings::getSettings();

        $this->plabCourse = json_decode($this->settings['plab2/cpsa_course'], true);
        $this->courseContent = json_decode($this->settings['course_content'], true);
        $this->whoTheCourseFor = json_decode($this->settings['who_the_course_for'], true);
        $this->courseAims = json_decode($this->settings['course_aims'], true);
        $this->courseLearningObjectives = json_decode($this->settings['learning_objectives'], true);
        $this->courseLearningOutcomes = json_decode($this->settings['learning_outcomes'], true);
     
    }

    public function render()
    {
        return view('livewire.courses', [
            'courses' => Course::paginate(15)
        ])->layout('app');
    }
}
