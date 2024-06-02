<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
{
    public function store(AnswerRequest $request)
    {
        foreach ($request->input('answers') as $answer) {
            $data['user_id'] = auth()->user()->id;
            $data['question_id'] = $answer['question_id'];
            $data['survey_id'] = $request->input('survey_id');

            if (is_array($answer['answer'])) {
                $data['answer'] = implode(', ', $answer['answer']);
            } else {
                $data['answer'] = $answer['answer'];
            }
            Answer::query()->create($data);
        }

        return Redirect::back();
    }
}
