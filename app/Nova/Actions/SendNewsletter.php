<?php

namespace App\Nova\Actions;

use App\Mail\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class SendNewsletter extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function handle(ActionFields $fields, $models)
    {
        foreach ($models as $model) {
            
            Mail::to($model->email)->send(new Newsletter($fields->message));
        }

        return Action::message('Sent successfully!');
    }

    public function fields(NovaRequest $request)
    {
        return [
            Textarea::make('Message', 'message')
                ->rules('required', 'string', 'min:5')
                ->help('Enter your message here.'),
        ];
    }
}

