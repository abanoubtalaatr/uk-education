<?php

namespace App\Livewire;

use Outl1ne\NovaSettings\NovaSettings;
use Livewire\Component;

class Page extends Component
{
    public $page = '', $tutors;

    public function mount($slug)
    {
        $this->page = \App\Models\Page::where('slug', $slug)->first();
        $this->tutors = \App\Models\Tutor::all();
    }

    public function render()
    {
        return view('livewire.page')->layout('app');
    }
}
