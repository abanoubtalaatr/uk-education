<?php

namespace App\Livewire;

use Livewire\Component;

class Page extends Component
{
    public $page = '';
    public function mount($slug)
    {
        $this->page = \App\Models\Page::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.page')->layout('app');
    }
}
