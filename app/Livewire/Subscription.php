<?php

namespace App\Livewire;

use Livewire\Component;

class Subscription extends Component
{
    public $subscriptions;

    public function mount()
    {
        $this->subscriptions = \App\Models\Subscription::paginate(15)->items();
    }
    public function render()
    {
        return view('livewire.subscription')->layout('app');
    }
}
