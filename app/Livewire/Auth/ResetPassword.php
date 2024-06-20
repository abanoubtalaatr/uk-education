<?php

namespace App\Livewire\Auth;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{
    public $type, $email, $otp_token, $password, $password_confirmation, $message;

    public function mount($type, $otp_token, $email)
    {
      
        $this->type = $type;
        $this->email = $email;
        $this->otp_token = $otp_token;
    }

    public function resetPassword()
    {
        
        $this->validate([
            'password' => 'required|confirmed|min:6',
        
        ]);
        
        
        if($this->type == 'tutor'){
            $tutor = Tutor::whereEmail($this->email)->where('otp_token', $this->otp_token)->first();
            $tutor->update(['password' => Hash::make($this->password), 'otp_token'  => null]);
            return redirect()->route('tutor-login');
        }

        if($this->type == 'student'){
            $student = User::whereEmail($this->email)->where('otp_token', $this->otp_token)->first();
            $student->update(['password' => Hash::make($this->password), 'otp_token'  => null]);
            return redirect()->route('student-login');
        }

        $this->message = "Something went wrong";
    }
    public function render()
    {
        return view('livewire.auth.reset-password')->layout('app');
    }
}
