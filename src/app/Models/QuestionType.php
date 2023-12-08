<?php

namespace Surveybuilders\Survey\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Surveybuilders\Survey\app\Models\SurveyQuestion;


class QuestionType extends Model
{
    use HasFactory;
    protected $fillable =['name'];

     public function surveyQuestion()
    {
        return $this->hasMany(SurveyQuestion::class);
    }
}
