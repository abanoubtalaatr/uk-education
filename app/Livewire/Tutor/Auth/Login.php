<?php

namespace App\Livewire\Tutor\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
    public $email, $password, $message;

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
        
        if (Auth::guard('tutor')->attempt($credentials)) {
            return redirect()->route('tutor-profile');
        }
        return $this->message = "Authentication failed";
        
    }

    public function render()
    {
        return view('livewire.tutor.auth.login')->layout('app');
    }
}
