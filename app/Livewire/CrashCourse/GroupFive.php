<?php

namespace App\Livewire\CrashCourse;

use Livewire\Component;
use App\Models\CrashCourse;
use Outl1ne\NovaSettings\NovaSettings;

class GroupFive extends Component
{
    public $crashCourse, $settings, $data;

    public function mount($crash_course)
    {
        $this->crashCourse = CrashCourse::find($crash_course);
        $this->settings = NovaSettings::getSettings();
        $this->data['title'] = $this->settings['group_five_title'];
        $this->data['price'] = $this->settings['group_five_price'];
        $this->data['group_5_instructions_for_crash_course'] = $this->settings['group_5_instructions_for_crash_course'];
         $this->data['group_5_instructions_for_crash_course'] = json_decode($this->data['group_5_instructions_for_crash_course']);
        
    }

    public function render()
    {
        return view('livewire.crash-course.group-five')->layout('app');
    }
}
