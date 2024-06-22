<?php

namespace App\Livewire;

use App\Models\Tutor;
use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;

class Tutors extends Component
{
    public $tutors; 
    public function mount()
    {
       $this->tutors = Tutor::all();
    }
    public function render()
    {
        return view('livewire.tutors')->layout('app');
    }
}
