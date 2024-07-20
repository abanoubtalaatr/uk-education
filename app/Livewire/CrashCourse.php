<?php

namespace App\Livewire;

use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;

class CrashCourse extends Component
{
    public $crashCourses, $settings, $plabCourse, $courseContent, $whoTheCourseFor, $courseAims, $courseLearningObjectives, $courseLearningOutcomes;

    public function mount()
    {
       $this->crashCourses = \App\Models\CrashCourse::paginate(15)->items(); 
       $this->settings = NovaSettings::getSettings();
       
       $this->plabCourse = json_decode($this->settings['plab2/cpsa_crash_course'], true);
      
       $this->courseContent = json_decode($this->settings['crash_course_content'], true);
        $this->whoTheCourseFor = json_decode($this->settings['who_the_crash_course_for'], true);
        $this->courseAims = json_decode($this->settings['crash_course_aims'], true);
        
        $this->courseLearningObjectives = json_decode($this->settings['crash_course_learning_objectives'], true);
    
        $this->courseLearningOutcomes = json_decode($this->settings['crash_course_learning_outcomes'], true);
    }
    public function render()
    {
        return view('livewire.crash-course')->layout('app');
    }
}
