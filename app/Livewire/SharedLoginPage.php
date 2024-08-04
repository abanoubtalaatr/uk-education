<?php

namespace App\Livewire;

use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;

class SharedLoginPage extends Component
{
    public $settings;

    public function mount()
    {
        $this->settings = NovaSettings::getSettings();
    }
    public function render()
    {
        return view('livewire.shared-login-page')->layout('app');
    }
}
