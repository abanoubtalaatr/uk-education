<?php

namespace App\Livewire\Tutor;

use App\Models\Tutor;
use Livewire\Component;
use App\Models\MockExam;
use App\Services\BookingService;
use Illuminate\Support\Facades\Mail;
use App\Mail\TutorBookingNotification;
use App\Services\AvailableTimeService;
use App\Mail\StudentBookingConfirmation;

class AboutTutor extends Component
{
    public $tutor, $availableTimes,$mockExam, $message, $selectedDate, $selectedTime, $selectedTutor;

    public function mount($tutor, $mock_exam)
    {
        $this->tutor = Tutor::find($tutor);
        $this->mockExam = MockExam::find($mock_exam);

        $this->selectedTutor = $tutor;
    }


    public function getAvailableTime($date)
    {
        if (!$this->selectedTutor) {
            $this->message = 'Please select a tutor';
        } else {
            $this->selectedDate = $date;
            
            $this->availableTimes = (new AvailableTimeService())->availableTime($date, $this->selectedTutor);
            
        }
    }

    public function chooseTime($time)
    {
        $this->selectedTime = $time;
    }

    public function bookNow()
    {
        
        if ($this->selectedTime && $this->selectedTutor && $this->selectedDate) {
            [$startTime, $endTime] = explode('-', $this->selectedTime);
            $data['tutor_id'] = $this->selectedTutor;
            $data['user_id'] = auth('web')->user()->id;
            $data['date'] = $this->selectedDate;
            $data['start_at'] = $startTime;
            $data['end_at'] = $endTime;
            $data['bookable_type'] = "App\Models\MockExam";
            $data['bookable_id'] = $this->mockExam->id;

            $tutor = Tutor::find($this->selectedTutor);
            $user = auth('web')->user();

            (new BookingService())->store($data);

            $bookingDetails = [
                'tutor_name' => $tutor->name,
                'date' => $this->selectedDate,
                'link' => $this->mockExam->link,
                'user' => $user,
                'tutor' => $tutor,
                'course_name' => $this->mockExam->name, // Assuming title is the course name
            ];

            // Send emails
            Mail::to($user->email)->send(new StudentBookingConfirmation($user, $bookingDetails));
            Mail::to($tutor->email)->send(new TutorBookingNotification($tutor, $bookingDetails));

            return redirect()->route('student-profile');
        } else {
            $this->message = 'Please select time, date, and tutor';
        }
    }
    public function render()
    {
        return view('livewire.tutor.about-tutor')->layout('app');
    }
}
