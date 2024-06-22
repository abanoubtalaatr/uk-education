<?php

namespace App\Livewire;

use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;

class CrashCourse extends Component
{
    public $crashCourses;

    public function mount()
    {
       $this->crashCourses = \App\Models\CrashCourse::paginate(15)->items(); 
       $this->settings = NovaSettings::getSettings();
    }
    public function render()
    {
        return view('livewire.crash-course')->layout('app');
    }
}
