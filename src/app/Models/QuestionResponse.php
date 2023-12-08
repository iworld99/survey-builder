<?php

namespace Surveybuilders\Survey\app\Models;;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionResponse extends Model
{
    use HasFactory;
    protected $fillable = ['survey_id','question_id','user_id','response'];

}
