<?php

namespace App\Livewire\MockExam;

use App\Models\MockExam;
use Livewire\Component;

class BankScenario extends Component
{
    public $mockExam;

    public function mount( $mock)
    {
        
        $this->mockExam = MockExam::find($mock);
        
    }

    public function render()
    {
        return view('livewire.mock-exam.bank-scenario')->layout('app');
    }
}
