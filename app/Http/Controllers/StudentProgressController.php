<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProgress;
use Illuminate\Support\Facades\Auth;

class StudentProgressController extends Controller
{
    public function store(Request $request)
    {
        $studentId = Auth::id();
        $topicId = $request->topic_id;

        StudentProgress::updateOrCreate(
            ['user_id' => $studentId, 'topic_id' => $topicId],
            ['video_completed' => true]
        );

        return response()->json(['message' => 'Video progress updated']);
    }
}
