<?php

namespace App\Livewire;

use App\Models\Tutor;
use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;

class Tutors extends Component
{
    public $tutors, $search; 
    public function mount()
    {
        $this->search = request()->query('search', '');

        $this->tutors = Tutor::where('name', 'like', '%' . $this->search . '%')->get();
    }
    public function render()
    {
        return view('livewire.tutors')->layout('app');
    }
}
