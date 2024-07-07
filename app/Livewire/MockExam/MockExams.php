<?php

namespace App\Livewire\MockExam;

use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;

class MockExams extends Component
{
    public $mockExams, $settings, $mockContent, $mockWhoIsTheCourseFor, $mockLearningObjectives, $mockLearningOutcomes, $mockCourseAims;

    public function mount()
    {
        $this->settings = NovaSettings::getSettings();
        $this->mockContent = json_decode($this->settings['mock_content'], true);
        $this->mockWhoIsTheCourseFor = json_decode($this->settings['mock_who_is_the_course_for'], true);
        $this->mockLearningObjectives = json_decode($this->settings['mock_learning_objectives'], true);
        $this->mockLearningOutcomes = json_decode($this->settings['mock_learning_outcomes'], true);
        $this->mockCourseAims = json_decode($this->settings['mock_course_aims'], true);
        
        $this->mockExams = \App\Models\MockExam::paginate(15)->items();
    }
    public function render()
    {
        return view('livewire.mock-exam.mock-exams')->layout('app');
    }
}
