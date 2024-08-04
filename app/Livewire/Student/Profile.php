<?php
namespace App\Livewire\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Outl1ne\NovaSettings\NovaSettings;

class Profile extends Component
{
    use WithFileUploads;

    public $information, $profileImage, $oldPassword, $password, $password_confirmation;
    public $settings;
    public $profileImageUrl;
    public $examConfirmations = [];
    public $examConfirmationEmail;
    public $examConfirmationEmailUrl;
    public $examConfirmationsUrls = [];
    public $examConfirmationOneUrl;
    public $examConfirmationOne;
    public $examConfirmationTwoUrl;
    public $examConfirmationTwo;
    public $results = [];

    protected $rules = [
        'information.name' => 'required|string|max:255',
        'information.email' => 'required|email|max:255',
        'information.mobile' => 'required|string|max:20',
        'information.whats_app_number' => 'required|string|max:20',
        'profileImage' => 'nullable|image|max:1024', // 1MB Max
        
        'examConfirmationEmail' => 'nullable|image|max:2048', // 2MB Max per image
        'examConfirmationOne' => 'nullable|image|max:2048', 
        'examConfirmationTwo' => 'nullable|image|max:2048', 
    ];

    public function mount()
    {
        $user = auth('web')->user();
        $this->information = $user->toArray();
        $this->profileImageUrl = $user->profile_photo_url ?? asset('assets/images/avatar.jpg');
        $this->examConfirmationEmailUrl = $user->exam_confirmation_email ?? asset('assets/images/avatar.jpg');
        $this->examConfirmationOneUrl = $user->exam_confirmation_one??null;
        $this->examConfirmationTwoUrl = $user->exam_confirmation_two??null;
        $this->settings = NovaSettings::getSettings();
        $this->results = $user->results;
    }

    public function updatedProfileImage()
    {
        if ($this->profileImage) {
            $this->profileImageUrl = $this->profileImage->temporaryUrl();
        }
    }

    public function updatedExamConfirmationEmail()
    {
        if ($this->examConfirmationEmail) {
            $this->examConfirmationEmailUrl = $this->examConfirmationEmail->temporaryUrl();
        }
    }

    public function updatedExamConfirmationOne()
    {
        if ($this->examConfirmationOne) {
            $this->examConfirmationOneUrl = $this->examConfirmationOne->temporaryUrl();
        }
    }

    public function updatedExamConfirmationTwo()
    {
        if ($this->examConfirmationTwo) {
            $this->examConfirmationTwoUrl = $this->examConfirmationTwo->temporaryUrl();
        }
    }

    public function updateProfile()
    {
        $this->validate();

        $user = auth('web')->user();

        // Update user information
        $user->update([
            'name' => $this->information['name'],
            'email' => $this->information['email'],
            'mobile' => $this->information['mobile'],
            'whats_app_number' => $this->information['whats_app_number'],
        ]);

        // Handle the file upload if a file is provided
        if ($this->profileImage) {
            $user->addMedia($this->profileImage->getRealPath())
                ->toMediaCollection('profile_picture');
        }

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

        session()->flash('message', 'Profile updated successfully.');
    }

    public function updatePassword()
    {
        $this->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = auth('web')->user();

        if (!Hash::check($this->oldPassword, $user->password)) {
            $this->addError('oldPassword', 'The provided password does not match your current password.');
            return;
        }

        $user->update(['password' => bcrypt($this->password)]);
        $this->oldPassword = '';
        $this->password = '';
        $this->password_confirmation = '';

        session()->flash('message', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.student.profile')->layout('app');
    }
}
