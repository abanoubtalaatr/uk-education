<?php

namespace App\Services;

use App\Models\CourseTutor;
use App\Models\MockExamTutor;

class MockExamService
{
    /**
     * Get the total number of students in a subscription.
     *
     * @return int
     */
    public static function getTotalStudentsInMockExam()
    {
        // Implement the logic here
    }

    /**
     * Get the total number of students in a specific subscription with a specific tutor.
     *
     * @param int $mockId
     * @param int $tutorId
     * @return int
     */
    public static function getTotalStudentsInMockExamByTutor($mockExamId, $tutorId)
    {
        return MockExamTutor::where('mock_exam_id', $mockExamId)->where('tutor_id', $tutorId)->count();
    }
}
