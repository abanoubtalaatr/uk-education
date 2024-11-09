<?php

namespace App\Livewire\Student\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Outl1ne\NovaSettings\NovaSettings;
use App\Livewire\Traits\ValidationTrait;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Register extends Component
{
    use ValidationTrait;
    use WithFileUploads;

    public $examConfirmationEmailUrl;
    public $examConfirmationEmail;
    public $examConfirmationOneUrl;
    public $examConfirmationTwoUrl;
    public $examConfirmationOne;
    public $examConfirmationTwo;
    public $uploadProgress = 0; // Progress tracking variable
    public $uploadProgressEmail= 0;
    public $uploadProgressOne =0;
    public $uploadProgressTwo =0;
    
    public $form = [
        'name' => '',
        'email' => '',
        'mobile' => '',
        'whats_app_number' => '',
        'password' => '',
        'password_confirmation' => '',
        'gmc_number'=> '',
        'exam_date' => '',
    ];
    public $settings;

    protected $rules;
    protected $listeners = ['fileUpload' => 'uploadProgress'];


    public function mount()
    {
        $this->rules = $this->getRules();
        $this->settings = NovaSettings::getSettings();
    }

    public function updatedExamConfirmationEmail()
    {
        if ($this->examConfirmationEmail) {
            $this->examConfirmationEmailUrl = $this->examConfirmationEmail->temporaryUrl();
        }
        $this->resetUploadProgress();

    }

    public function updatedExamConfirmationOne()
    {
        if ($this->examConfirmationOne) {
            $this->examConfirmationOneUrl = $this->examConfirmationOne->temporaryUrl();
        }
        $this->resetUploadProgress();

    }

    public function updatedExamConfirmationTwo()
    {
        if ($this->examConfirmationTwo) {
            $this->examConfirmationTwoUrl = $this->examConfirmationTwo->temporaryUrl();
        }
        $this->resetUploadProgress();

    }

    public function uploadProgress($percent)
    {
        $this->uploadProgress = $percent;
    }

    private function resetUploadProgress()
    {
        $this->uploadProgress = 0;
    }
    public function register()
    {
        $this->validate($this->rules);

        $this->form['password'] = Hash::make($this->form['password']);
        $user = User::create($this->form);

        if ($this->examConfirmationEmail) {
            $user->addMedia($this->examConfirmationEmail->getRealPath())
                ->toMediaCollection('exam_confirmation_email');
        }

        if ($this->examConfirmationOne) {
            $user->addMedia($this->examConfirmationOne->getRealPath())
                ->toMediaCollection('exam_confirmation_one');
        }

        if ($this->examConfirmationTwo) {
            $user->addMedia($this->examConfirmationTwo->getRealPath())
                ->toMediaCollection('exam_confirmation_two');
        }

        return redirect()->route('student-login');
    }

    public function getRules()
    {
        return [
            'form.name' => ['required', 'string'],
            'form.email' => ['required', 'email', 'unique:users,email'],
            'form.whats_app_number' => ['required', 'string', 'min:8', 'unique:users,whats_app_number'],
            'form.password' => ['required', 'string', 'min:8', 'confirmed'],
            'form.mobile' => ['required', 'string', 'min:9', 'max:15', 'unique:users,mobile'],
            'form.gmc_number' => ['required', 'string'],
            'form.exam_date' => ['required', 'date'],
            'examConfirmationEmail' => ['required', 'image'],
            'examConfirmationOne' => ['required', 'image'],
            'examConfirmationTwo' => ['required', 'image'],
        ];
    }

    public function render()
    {
        return view('livewire.student.auth.register')->layout('app');
    }
}
