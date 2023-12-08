<?php

namespace Surveybuilders\Survey\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Surveybuilders\Survey\Models\SurveyQuestion;


class QuestionType extends Model
{
    use HasFactory;
    protected $fillable =['name'];

     public function surveyQuestion()
    {
        return $this->hasMany(SurveyQuestion::class);
    }
}
