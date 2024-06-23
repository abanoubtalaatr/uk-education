<?php

namespace App\Livewire\MockExam;

use App\Models\Tutor;
use Livewire\Component;
use App\Models\MockExam;

class BookMock extends Component
{
    public $mockExam, $tutors,$availableTimes = [];

    public function mount($mock)
    {
        $this->mockExam = MockExam::find($mock);
        $this->tutors = Tutor::whereHas('mockExams', function ($query) {
            $query->where('mock_exam_id', $this->mockExam->id);
        })->get();
        
        
    }
    
    public function render()
    {
        return view('livewire.mock-exam.book-mock')->layout('app');
    }
}
