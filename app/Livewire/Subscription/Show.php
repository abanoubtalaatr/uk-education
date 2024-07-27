<?php

namespace App\Livewire\Subscription;

use App\Models\StudentProgress;
use App\Models\Subscription;
use App\Services\BookingService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $subscription, $progress;

    public function mount(Subscription $subscription)
    {
        $this->subscription = $subscription;

        $this->progress = $this->getProgress();
        
        if (!auth('web')->check()) {
            return redirect()->route('student-login');
        }
        
        // Store booking details
        

        // (new BookingService())->store($data);

        // Optionally, send emails (commented out)
        // Mail::to($user->email)->send(new StudentBookingConfirmation($user, $bookingDetails));
        // Mail::to($tutor->email)->send(new TutorBookingNotification($tutor, $bookingDetails));
    }

    public function getProgress()
    {
        $subscription = Subscription::with('topics')->findOrFail($this->subscription->id);
        $studentId = Auth::id();

        if ($studentId) {
            $totalTopics = $subscription->topics->count();
            $completedTopics = StudentProgress::where('user_id', $studentId)
                ->whereIn('topic_id', $subscription->topics->pluck('id'))
                ->where('video_completed', true)
                ->count();

            return $totalTopics > 0 ? ($completedTopics / $totalTopics) * 100 : 0;
        } else {
            return 0;
        }
    }

    public function render()
    {
        return view('livewire.subscription.show')->layout('app');
    }
}
