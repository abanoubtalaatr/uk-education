<?php

namespace App\Livewire\Subscription;

use App\Models\Subscription;
use Livewire\Component;

class Show extends Component
{
    public $subscription;

    public function mount(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }
    
    public function render()
    {
        return view('livewire.subscription.show')->layout('app');
    }
}
