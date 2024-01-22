<?php

// app/Http/Controllers/ContentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function showAssignmentForm()
    {
        // Logic for displaying Assignment form or modal
        return view('lecturer.assignment');
    }

    public function showQuizForm()
    {
        // Logic for displaying Quiz form or modal
        return view('lecturer.quiz');
    }

    public function showQuestionForm()
    {
        // Logic for displaying Question form or modal
        return view('lecturer.question');
    }

    public function showLearningMaterialForm()
    {
        // Logic for displaying Learning Material form or modal
        return view('lecturer.learningMaterial');
    }

    public function showTopicForm()
    {
        // Logic for displaying Topic form or modal
        return view('lecturer.topic');
    }
}


