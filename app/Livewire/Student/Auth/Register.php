<?php

namespace App\Livewire\Student\Auth;

// app/Livewire/Student/Auth/Register.php

namespace App\Livewire\Student\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Outl1ne\NovaSettings\NovaSettings;
use App\Livewire\Traits\ValidationTrait;


class Register extends Component
{
    use ValidationTrait;

    public $form = [
        'name' => '',
        'email' => '',
        'mobile' => '',
        'whats_app_number' => '',
        'password' => '',
        'password_confirmation' => '',
    ];
    public $settings;

    protected $rules;

    public function mount()
    {
        $this->rules = $this->getRules();
        $this->settings = NovaSettings::getSettings();

    }

    public function register()
    {
        // For debugging purposes, use `dd()` to check if the method is triggered
        

        // Validate the form data using the defined rules
        $this->validate($this->rules);

        // Hash the password before saving it to the database
        $this->form['password'] = Hash::make($this->form['password']);

        // Create a new user record in the database
        User::create($this->form);
        

        // Redirect to the student profile page upon successful registration
        return redirect()->route('student-login');
    }

    public function getRules()
    {
        return [
            'form.name' => ['required', 'string'],
            'form.email' => ['required', 'email', 'unique:users,email'],
            'form.whats_app_number' => ['required', 'string','min:8', 'unique:users,whats_app_number'],
            'form.password' => ['required', 'string', 'min:8', 'confirmed'],
            'form.mobile' => ['required', 'string', 'min:9', 'max:15', 'unique:users,mobile'],
        ];
    }

    public function render()
    {
        return view('livewire.student.auth.register')->layout('app');
    }
}
