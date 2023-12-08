<?php

namespace Surveybuilders\Survey\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Surveybuilders\Survey\Models\Survey;
use Surveybuilders\Survey\Models\QuestionType;
use Surveybuilders\Survey\Models\SurveyQuestion;

class SurveyController extends Controller
{
    public $count = 0;

    public function index()
    {
        $survey = Survey::all();
        return view('survey::show', compact('survey'));
    }
    public function create()
    {
        return view('survey::create');
    }
    public function store(Request $request)
    {
        Survey::create($request->all());
        return redirect()->route('survey');
    }

    public function showsurvey($id)
    {
        $survey_id = $id;
        $question_type = QuestionType::all();
        $surveyquestion = SurveyQuestion::where('survey_id',$survey_id)->get();
         // dd($surveyquestion);
        return view('survey::showSurvey',compact('question_type','survey_id','surveyquestion'));
    }

    public function showquestion()
    {
        return view('survey::questions.show');
    }


    public function getallQuestion()
    {
        $allQuestion = SurveyQuestion::all();
        dd($allQuestion);
        return back();
    }


    public function edit(Request $request)
    {
        $data = SurveyQuestion::where('id',$request->id)->first();
        return response()->json($data);
    }


    public function PartialsaveData(Request $request)
    {

        $Count = $this->count++;
        $QuestionData['id'] = $request->id;
        $QuestionData['question'] = $request->question;
        $QuestionData['survey_id'] = $request->survey_id;
        $QuestionData['question_type_id'] = $request->question_type_id;
        $QuestionData['option_choice'] = $request->optionChoice;
        $QuestionData['order_weightage'] = $request->order_weightage;
        $QuestionData['is_mandatory'] = $request->is_mandatory;

        if($request->id)
        {
            $data = [
                'id' => $QuestionData['id'],
                'question' => $QuestionData['question'],
                'survey_id' => $QuestionData['survey_id'],
                'question_type_id' => $QuestionData['question_type_id'],
                'option_choice' => $QuestionData['option_choice'],
            ];
                  // dd($data);
                SurveyQuestion::where('id', $QuestionData['id'])->update($data);
        }
        else{
                $weightage_count = SurveyQuestion::count();

                $data = new SurveyQuestion;
                $data->question = $QuestionData['question'];
                $data->survey_id = $QuestionData['survey_id'];
                $data->question_type_id = $QuestionData['question_type_id'];
                $data->option_choice = $QuestionData['option_choice'];
                $data->order_weightage = $weightage_count;
                $data->is_mandatory = $QuestionData['is_mandatory'];
                $data->order_weightage++;

                $data->save();
        }

        $question_data = QuestionType::where('id', $QuestionData['question_type_id'])->first();
        // dd($question_data);
      if ($question_data == null){
          return response()->json(['error' => 'Error msg question_type_id not found.'], 404);
      }
      return view('survey::show_card_partial')->with('data', $data)->with('count', $Count)->with('question_data', $question_data);
    }


    public function PartialviewData($id)
    {
        // dd('$id');
        $survey_id = $id;
        $question_type = QuestionType::all();
        $surveyquestion = SurveyQuestion::where('survey_id',$survey_id)->orderByDesc('order_weightage')->get();
        $preview_survey = SurveyQuestion::where('survey_id',$id)->orderByDesc('order_weightage')->get();
        return view('survey::partial',compact('question_type','survey_id','surveyquestion','preview_survey'));
    }


    public function setOptionChoice(Request $request)
    {
        // dd($request->all());
        $question_data = QuestionType::where('id',$request->id)->first();
        $old_value = SurveyQuestion::where('id',$request->question_id)->first();
        // dd($old_value);
        return view('survey::question_option_choice',compact('question_data','old_value'));
    }

}
