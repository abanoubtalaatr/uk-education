<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Outl1ne\NovaSettings\NovaSettings;


class Welcome extends Component
{
    public $courses, $tutors, $sliders, $testimonials, $settings;

    public function mount()
    {
        $this->courses = Course::query()->get();
        $this->tutors = \App\Models\Tutor::query()->get();
        $this->sliders = \App\Models\Slider::query()->get();
        $this->testimonials = \App\Models\Testimonial::query()->get();
        $this->settings = NovaSettings::getSettings();
        

    }

    public function render()
    {
        
        return view('livewire.welcome')->layout('app', ['title' => 'Welcome']);
    }
}
