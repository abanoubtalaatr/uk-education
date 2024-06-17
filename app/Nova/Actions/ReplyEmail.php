<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Mail\ReplyMail;
use App\Models\Contact;

class ReplyEmail extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, $models)
    {
        foreach ($models as $model) {
            if ($model->replied) {
                return Action::danger('This contact has already been replied to.');
            }

            Mail::to($model->email)->send(new ReplyMail($model, $fields->reply_message));

            // Mark the contact as replied
            $model->replied = true;
            $model->save();
        }

        return Action::message('Reply sent successfully!');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Textarea::make('Reply Message', 'reply_message')
                ->rules('required', 'string', 'min:5')
                ->help('Enter your reply message here.'),
        ];
    }
}
