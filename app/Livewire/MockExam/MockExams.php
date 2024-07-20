<?php

namespace App\Livewire\MockExam;

use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;

class MockExams extends Component
{
    public $mockExams, $settings, $ourPlab2Mocks, $whenToTakeAMock, $whyIsItImportant, $mockResultsAndFeedback, $mockCourseAims;

    public function mount()
    {
        $this->settings = NovaSettings::getSettings();
        
        $this->ourPlab2Mocks = json_decode($this->settings['our_plab2_mocks'], true);
        $this->whenToTakeAMock = json_decode($this->settings['when_to_take_a_mock'], true);
        $this->whyIsItImportant = json_decode($this->settings['why_is_it_important'], true);
        $this->mockResultsAndFeedback = json_decode($this->settings['mock_results_and_feedback'], true);
        
        $this->mockExams = \App\Models\MockExam::paginate(15)->items();
    }
    public function render()
    {
        return view('livewire.mock-exam.mock-exams')->layout('app');
    }
}
