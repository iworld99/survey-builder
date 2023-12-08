<?php

namespace Surveybuilders\Survey\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Surveybuilders\Survey\app\Models\Survey;
use Surveybuilders\Survey\app\Models\QuestionType;
use Surveybuilders\Survey\app\Models\SurveyQuestion;

class QuestionTypeController extends Controller
{
    public function showquestion()
    {
        dd('abc');
        return view('survey::questions.show');
    }

}
