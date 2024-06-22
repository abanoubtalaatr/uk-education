<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Outl1ne\NovaSettings\NovaSettings;

class Courses extends Component
{
    use WithPagination;

    public $courses = [], $settings;

    public function mount()
    {
        $this->courses = Course::paginate(15)->items();
        $this->settings = NovaSettings::getSettings();
    }

    public function render()
    {
        return view('livewire.courses', [
            'courses' => Course::paginate(15)
        ])->layout('app');
    }
}
