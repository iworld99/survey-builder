<?php

namespace Surveybuilders\Survey\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Surveybuilders\Survey\app\Models\Survey;
use Surveybuilders\Survey\app\Models\QuestionType;
use Surveybuilders\Survey\app\Models\SurveyQuestion;
use Surveybuilders\Survey\app\Models\QuestionResponse;

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
      if ($question_data == null){
          return response()->json(['error' => 'Error msg question_type_id not found.'], 404);
      }
      return view('survey.partial_ajax::show_card_partial')->with('data', $data)->with('count', $Count)->with('question_data', $question_data);
    }


    public function PartialviewData($id)
    {
        // dd('$id');
        $survey_id = $id;
        $question_type = QuestionType::all();
        $surveyquestion = SurveyQuestion::where('survey_id',$survey_id)->orderByDesc('order_weightage')->get();
        $preview_survey = SurveyQuestion::where('survey_id',$id)->orderByDesc('order_weightage')->get();
        return view('survey.partial_ajax::partial',compact('question_type','survey_id','surveyquestion','preview_survey'));
    }


    public function setOptionChoice(Request $request)
    {
        // dd($request->all());
        $question_data = QuestionType::where('id',$request->id)->first();
        $old_value = SurveyQuestion::where('id',$request->question_id)->first();
        // dd($old_value);
        return view('survey.partial_ajax::question_option_choice',compact('question_data','old_value'));
    }

    public function orderWeightage(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            SurveyQuestion::where('survey_id',$value['surveyID'])->where('id',$value['id'])->update([

                'id' => $value['id'],
                'survey_id' => $value['surveyID'],
                'order_weightage'=>$value['orderWeightage'],
            ]);
        }
        $afterdrag = SurveyQuestion::where('survey_id',$request['0']['surveyID'])->orderByDesc('order_weightage')->get();
        // dd($afterdrag);
        return view('survey.partial_ajax::preview_drag_partial')->with('afterdrag', $afterdrag);
    }


    public function previewsaveData(Request $request)
    {
//        dd($request->all());
        $questions = SurveyQuestion::where('survey_id', $request->survey_id)->get();
        $data = [];

        if (count($questions)) {
            foreach ($questions as $question) {
                $fieldName = $question->id . 'response';

                $checkboxValues = $request->input($fieldName);

                // Check if $checkboxValues is an array
                if (is_array($checkboxValues)) {
                    // Convert array to a JSON-encoded string for database storage
                    $checkboxValuesString = json_encode($checkboxValues);
                } else {
                    // It's a single value, use it directly
                    $checkboxValuesString = $checkboxValues;
                }
                    $response = QuestionResponse::updateOrCreate(
                        [
                            'survey_id' => $request->survey_id,
                            'question_id' => $question->id,
                        ],
                        [
                            'response' => $checkboxValuesString,
                        ]
                    );

                    $data[] = $response;
            }
        }

        return response()->json(['message' => 'Data saved successfully', 'data' => $data]);
    }


    public function editpreview(Request $request)
    {
        $survey_id = $request->id;
        $surveyquestion = SurveyQuestion::where('survey_id', $survey_id)->get();
        $items = QuestionResponse::where('survey_id', $survey_id)->get();
        ///dd($items);
        return response()->json([
            'message' => 'success',
            'items' => $items,
        ]);
        //  return view('survey::partial', compact('items', 'survey_id', 'surveyquestion'));

    }

}
