<?php

namespace App\Livewire;

use Livewire\Component;
use Ramsey\Uuid\Rfc4122\VariantTrait;
use Outl1ne\NovaSettings\NovaSettings;

class Contact extends Component
{

    public $form = [];
    public $message;
    public $settings;

    public function mount()
    {
        $this->settings = NovaSettings::getSettings();
    }
    protected $rules = [
        'form.name' => ['required', 'string', 'min:2'],
        'form.email' => ['required', 'email'],
        'form.message' => ['required', 'string', 'min:3'],
        'form.message_type' => ['required', 'string'],
    ];

    public function store()
    {
        $this->validate();
        
        \App\Models\Contact::create($this->form);

        $this->reset('form');
        $this->message = "Message sent successfully!";
    }

    public function render()
    {
        return view('livewire.contact')->layout('app');
    }
}
