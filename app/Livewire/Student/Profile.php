<?php

namespace App\Livewire\Student;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Outl1ne\NovaSettings\NovaSettings;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    use WithFileUploads;

    public $tutor, $information, $subscriptions, $courses, $mockExams, $crashCourses, $slots = [], $profileImage, $oldPassword, $password, $password_confirmation;
    public $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public $weekOffset = 0;
    public $bookings = [];
    public $currentWeek;
    public $settings;
    protected $listeners = ['imageUploaded' => 'forceRender'];


    public function mount()
    {
        $this->information = auth('web')->user()->toArray();
        $this->subscriptions = auth('web')->user()->subscriptions;
        
        $this->courses = auth('web')->user()->courses;
        $this->mockExams = auth('web')->user()->mockExams;
        $this->crashCourses = auth('web')->user()->crashCourses;
        $this->settings = NovaSettings::getSettings();
        $this->loadBookings();
    }

    public function loadBookings()
    {
        $userId = Auth::id();

        $startOfWeek = now()->startOfWeek()->addWeeks($this->weekOffset);
        $endOfWeek = now()->endOfWeek()->addWeeks($this->weekOffset);

        $bookings = Booking::where('user_id', $userId)
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->with('user')
            ->get();

        $groupedBookings = [];
        foreach ($bookings as $booking) {
            $dayOfWeek = Carbon::parse($booking->date)->format('l');
            $groupedBookings[$dayOfWeek][] = $booking;
        }

        $this->bookings = $groupedBookings;
        $this->currentWeek = $startOfWeek->format('Y-m-d') . ' To ' . $endOfWeek->format('Y-m-d');
    }
    public function previousWeek()
    {
        logger('Previous week called');
        $this->weekOffset--;
        $this->loadBookings();
    }

    public function nextWeek()
    {
        logger('Next week called');
        $this->weekOffset++;
        $this->loadBookings();
    }

    public function updateProfile()
    {
        $user = auth('web')->user();

        $validatedData = $this->validate([
            'information.name' => 'required|string|max:255',
            'information.email' => 'required|email|max:255',
            'information.mobile' => 'required|string|max:20',
            'information.whats_app_number' => 'required|string|max:20',
            'profileImage' => 'nullable|image|max:1024', // 1MB Max
        ]);

        if ($this->profileImage) {
            $path = $this->profileImage->store('profile_images', 'public');
            $validatedData['information']['profile_image_url'] = Storage::url($path);

        
            // // Delete the old image if it exists
            if ($user->profile_image_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $user->profile_image_url));
            }
        }

        $user->update($validatedData['information']);
        

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
