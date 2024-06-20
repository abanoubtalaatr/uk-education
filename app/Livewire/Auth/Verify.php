<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Mail\OTPMail;
use App\Models\Tutor;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class Verify extends Component
{
    public $email, $type, $message, $number1, $number2, $number3, $number4;

    public function mount($email, $type)
    {
        $this->email = $email;
        $this->type = $type;
    }

    public function verifyCode()
    {
        $otp = $this->number1. $this->number2. $this->number3. $this->number4;
       
        if(strlen($otp) == 0){
            $this->message = "Enter OTP";
            return;
        }
        if(strlen($otp) < 4){
            $this->message = "Invalid OTP";
            return;
        }

        if($this->type == 'tutor'){
            $tutor = Tutor::whereEmail($this->email)->first();
            if($tutor){
                if($tutor->otp == $otp){
                    $otp_token = Str::random(60);
                    
                    $tutor->update(['otp' => null, 'otp_token' => $otp_token]);
                    
                    return redirect()->route('auth.reset_password', ['type'=> $this->type,'otp_token' => $otp_token, 'email' => $tutor->email]);
                }
            }else{
                $this->message = "Tutor not found check correct email";
                return;
            }
        }

        if($this->type == 'student'){
            $student = User::whereEmail($this->email)->first();
            if($student){
                if($student->otp == $otp){
                    $otp_token = Str::random(60);
                    
                    $student->update(['otp' => null, 'otp_token' => $otp_token]);
                    
                    return redirect()->route('auth.reset_password', ['type'=> $this->type,'otp_token' => $otp_token, 'email' => $student->email]);
                }
            }else{
                $this->message = "Tutor not found check correct email";
                return;
            }
        }

        $this->message = "Something went wrong";
    }

    public function resendCode()
    {
        
        
        $this->validate([
            'email' => 'required|email'
        ]);

        if($this->type == 'tutor'){
            $tutor = Tutor::whereEmail($this->email)->first();

            $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            Mail::to($tutor->email)->send(new OTPMail($otp));
            $tutor->update(['otp' => $otp]);
            $this->message = "Sent successfully";
            $this->reset(['number1' , 'number2', 'number3', 'number4']);
        }

        if($this->type == 'student'){
            $student = User::whereEmail($this->email)->first();

            $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            Mail::to($student->email)->send(new OTPMail($otp));
            $student->update(['otp' => $otp]);
            $this->message = "Sent successfully";
            $this->reset(['number1' , 'number2', 'number3', 'number4']);
        }
    }

    public function render()
    {
        return view('livewire.auth.verify')->layout('app');
    }
}
