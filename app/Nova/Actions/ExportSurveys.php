<?php

namespace App\Nova\Actions;

use App\Models\Survey;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportSurveys extends DownloadExcel implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Define the headings for the export.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Survey Title',
            'Question Text',
            'Answer Text',
            'User Name',
        ];
    }

    /**
     * Fetch the data for the export.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Survey::with(['questions.answers.user'])->get(); // Ensure the user relationship is eager loaded
    }

    /**
     * Map the data for each row.
     *
     * @param  mixed  $survey
     * @return array
     */
    public function map($survey): array
    {
        $rows = [];
        $surveyProcessed = false;

        // Iterate through each question in the survey
        foreach ($survey->questions as $question) {
            // Process each survey only once
            if (!$surveyProcessed) {
                // If the survey has not been processed yet, add it to the export data along with its first question and answers
                foreach ($question->answers as $answer) {
                    $rows[] = [
                        'survey_title' => $survey->name,
                        'question_text' => $question->name,
                        'answer_text' => $answer->answer,
                        'user_name' => $answer->user->name,
                    ];
                }
                // Mark the survey as processed
                $surveyProcessed = true;
            } else {
                // If the survey has already been processed, only add the question and its answers to the export data
                foreach ($question->answers as $answer) {
                    $rows[] = [
                        'survey_title' => '', // Leave survey title empty for additional questions
                        'question_text' => $question->name,
                        'answer_text' => $answer->answer,
                        'user_name' => $answer->user->name,
                    ];
                }
            }
        }

        return $rows;
    }
}
