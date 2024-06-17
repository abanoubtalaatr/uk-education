<?php

namespace App\Livewire;

use Livewire\Component;

class CrashCourse extends Component
{
    public $crashCourses;

    public function mount()
    {
       $this->crashCourses = \App\Models\CrashCourse::paginate(15)->items(); 
    }
    public function render()
    {
        return view('livewire.crash-course')->layout('app');
    }
}
