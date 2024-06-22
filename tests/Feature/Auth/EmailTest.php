<?php

namespace Tests\Feature\Auth;


use App\Mail\OTPMail;
use App\Models\User;
use App\Models\Tutor;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class EmailTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_should_send_email_and_redirect_to_verify_page(){
        Mail::fake();

        $tutor = Tutor::factory()->create();

        Livewire::test('auth.email', ['type' => 'tutor'])
            ->set('email', $tutor->email)
            ->call('send')
            ->assertRedirect(route('auth.verify', ['email' => $tutor->email, 'type' => 'tutor']));

        Mail::assertSent(OTPMail::class, function ($mail) use ($tutor) {
            return $mail->hasTo($tutor->email);
        });

    }

    /** @test */
    public function it_should_show_error_message_when_tutor_not_found()

     {
        Livewire::test('auth.email', ['type' => 'tutor'])
            ->set('email', 'not_exist_tutor@example.com')
            ->call('send')
            ->assertHasNoErrors()
            ->assertSee('Tutor not found check correct email');
     }

    /** @test */
    public function it_should_send_email_and_redirect_to_verify_page_when_type_is_student()
    {
        Mail::fake();

        $student = User::factory()->create();

        Livewire::test('auth.email', ['type' => 'student'])
            ->set('email', $student->email)
            ->call('send')
            ->assertRedirect(route('auth.verify', ['email' => $student->email, 'type' => 'student']));

        Mail::assertSent(OTPMail::class, function ($mail) use ($student) {
            return $mail->hasTo($student->email);
        });
    }

    /** @test */
    public function it_should_show_error_message_when_student_not_found()
    {
        Livewire::test('auth.email', ['type' => 'student'])
            ->set('email', 'not_exist_student@example.com')
            ->call('send')
            ->assertHasNoErrors()
            ->assertSee('Student not found');
    }

    /** @test */
    public function it_should_show_error_message_when_email_is_invalid()
    {
        Livewire::test('auth.email', ['type' => 'tutor'])
            ->set('email', 'invalid_email')
            ->call('send')
            ->assertHasErrors(['email' => 'required|email']);
    }

    /** @test */
    public function it_should_show_error_message_when_email_is_empty()
    {
        Livewire::test('auth.email', ['type' => 'tutor'])
            ->set('email', '')
            ->call('send')
            ->assertHasErrors(['email' => 'required|email']);
    }

    /** @test */
    public function it_should_show_error_message_when_type_is_empty()
    {
        Livewire::test('auth.email', ['type' => ''])
            ->set('email', 'valid_email@example.com')
            ->call('send')
            ->assertHasNoErrors()
            ->assertSee('Ensure form every thing is correct.');
    }
}
