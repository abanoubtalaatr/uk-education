<?php

namespace App\Livewire\Auth;

use App\Mail\OTPMail;
use App\Models\User;
use App\Models\Tutor;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Email extends Component
{
    public $type, $email, $message;

    public function mount($type)
    {
        $this->type = $type;
    }

    public function send()
    {
        $this->message = null;
        $this->validate([
            'email' => 'required|email'
        ]);

        if($this->type =='tutor'){
            $tutor = Tutor::whereEmail($this->email)->first();
            
            if($tutor){
                $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

                Mail::to($tutor->email)->send(new OTPMail($otp));
                $tutor->update(['otp' => $otp]);
                return redirect()->route('auth.verify',['email' => $tutor->email,'type' =>'tutor']);
            }else{
                $this->message = "Tutor not found check correct email";
                return;
            }
            
        }

        if($this->type == 'student'){
            $student = User::whereEmail($this->email)->first();
            if($student){
                $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                Mail::to($student->email)->send(new OTPMail($otp));
                $student->update(['otp' => $otp]);
                return redirect()->route('auth.verify', ['email' => $student->email , 'type' => 'student']);
            }else{
                $this->message = "Student not found";
                return;
            }
            
        }

        $this->message = "Ensure form every thing is correct.";
    }

    

    public function render()
    {
        return view('livewire.auth.email')->layout('app');
    }
}
