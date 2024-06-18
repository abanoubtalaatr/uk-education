<?php

namespace App\Livewire\MockExam;

use Livewire\Component;
use App\Models\MockExam;
use App\Services\BookingService;
use App\Services\AvailableTimeService;

class Show extends Component
{
    public $mockExam, $tutors;
    public $selectedDate;
    public $availableTimes = [];
    public $selectedTutor;
    public $message;
    public $selectedTime;
    
    public function mount($mock)
    {
        $this->mockExam = MockExam::find($mock);
        $this->tutors = $this->mockExam->tutors;
        $this->selectedDate = now()->format('Y-m-d'); // Default selected date
        
    }

    public function selectTutor($id)
    {
        $this->selectedTutor = $id;
        $this->message = null;
    }
    public function getAvailableTime($date)
    {
        
        if(!$this->selectedTutor){
            $this->message = 'Please select a tutor';
        }else{
            $this->selectedDate = $date;
            $this->availableTimes = (new AvailableTimeService())->availableTime( $date,$this->selectedTutor);
        }
    }

    public function chooseTime($time)
    {
        
        $this->selectedTime = $time;
    }


    public function bookNow()
    {
        if($this->selectedTime && $this->selectedTutor && $this->selectedDate){
            [$startTime, $endTime] = explode('-', $this->selectedTime);
            $data['tutor_id'] = $this->selectedTutor;
            $data['user_id'] = auth('web')->user()->id; 
            $data['date'] = $this->selectedDate;
            $data['start_at'] = $startTime;
            $data['end_at'] = $endTime;
            $data['bookable_type'] = "App\Models\MockExam";
            $data['bookable_id'] = $this->mockExam->id;
            
            (new BookingService())->store($data);

            return redirect()->route('student-profile');
        }else{
            $this->message = 'Please select time, date and tutor';
        }
    }
    public function render()
    {
        return view('livewire.mock-exam.show')->layout('app');
    }
}
