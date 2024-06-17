<?php

namespace App\Livewire\Tutor;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $tutor, $information, $subscriptions, $courses, $mockExams, $crashCourses;
    public function mount()
    {
        $this->information = auth('tutor')->user()->toArray();
        $this->subscriptions =  auth()->user('tutor')->subscriptions;
        $this->courses = auth()->user('tutor')->courses;
        $this->mockExams = auth()->user('tutor')->mockExams;
        $this->crashCourses = auth()->user('tutor')->crashCourses;
    }

    public function updateProfile()
    {
        $user = auth('tutor')->user();
        $user->update($this->information);
        session()->flash('message', 'Profile updated successfully.');
    }
    public function changePassword()
    {
        $user = auth('tutor')->user();

        if (!Hash::check($this->oldPassword, $user->password)) {
            session()->flash('error', 'Old password does not match.');
            return;
        }

        if ($this->newPassword !== $this->rePassword) {
            session()->flash('error', 'New password and retype password do not match.');
            return;
        }

        $user->update(['password' => Hash::make($this->newPassword)]);
        session()->flash('message', 'Password changed successfully.');
    }
    public function render()
    {
        return view('livewire.tutor.profile')->layout('app');
    }
}
