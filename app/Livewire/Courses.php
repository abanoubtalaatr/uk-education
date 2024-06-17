<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;

    public $courses = [];

    public function mount()
    {
        $this->courses = Course::paginate(15)->items();
    }

    public function render()
    {
        return view('livewire.courses', [
            'courses' => Course::paginate(15)
        ])->layout('app');
    }
}
