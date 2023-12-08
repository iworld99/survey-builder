<?php

namespace Surveybuilders\Survey\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Surveybuilders\Survey\app\Models\QuestionType;

class SurveyQuestion extends Model
{
    use HasFactory;
    protected $fillable =['question','survey_id','question_type_id'];

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }
}
