<?php

namespace App\Livewire\Student\Auth;

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
