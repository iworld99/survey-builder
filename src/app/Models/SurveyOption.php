<?php


namespace Surveybuilders\Survey\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyOption extends Model
{
    use HasFactory;

    protected $fillable = ['option_name', 'option_type', 'question_id'];
}
