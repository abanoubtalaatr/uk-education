<?php

namespace App\Livewire\BankScenario;

use Livewire\Component;
use App\Models\Scenario;
use App\Models\BankScenario;

class Scenarios extends Component
{
    public $scenarios, $scenario;
    
    public function mount($scenario)
    {
        $this->scenario = Scenario::find($scenario);
    }

    public function render()
    {
        return view('livewire.bank-scenario.scenarios')->layout('app');
    }
}
