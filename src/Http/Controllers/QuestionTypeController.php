<?php

namespace Surveybuilders\Survey\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Surveybuilders\Survey\Models\Survey;
use Surveybuilders\Survey\Models\QuestionType;
use Surveybuilders\Survey\Models\SurveyQuestion;

class QuestionTypeController extends Controller
{
    public function showquestion()
    {
        dd('abc');
        return view('survey::questions.show');
    }

}
