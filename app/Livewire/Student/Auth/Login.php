<?php

namespace App\Livewire\Student\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Outl1ne\NovaSettings\NovaSettings;

class Login extends Component
{
    public $email, $password, $message, $settings;
    
    public function mount()
    {
        $this->settings = NovaSettings::getSettings();
    }

    public function login()
    { 
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('student-profile');
        }
        return $this->message = "Authentication failed";
        
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('student-login');
    }

    public function render()
    {
        return view('livewire.student.auth.login')->layout('app');
    }
}
