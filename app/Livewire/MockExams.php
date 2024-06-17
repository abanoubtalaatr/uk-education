<?php

namespace App\Livewire;

use Livewire\Component;

class MockExams extends Component
{
    public $mockExams;

    public function mount()
    {
        $this->mockExams = \App\Models\MockExam::paginate(15)->items();
    }
    public function render()
    {
        return view('livewire.mock-exams')->layout('app');
    }
}
