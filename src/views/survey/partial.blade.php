
	<!-- MODAL PAGE  -->
                    <div>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between p-4">
                            <p style="text-align: center;color: #b1b6b9;" id="draganddropDisplay">drag and drop a question here</p>
                            <button type="button" class="btn btn-light" style="float:right" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                        </nav>
                    </div>

		     <div class="card p-4" id="cardBody" style="background:#f2f2f22e;">
		        @foreach($surveyquestion as $surveyquestion)
		        <div class="card-body" id="card{{$surveyquestion->id}}" onclick="editmodal({{$surveyquestion->id}},{{$surveyquestion->question_type_id}})">
		        <input type="hidden" name="id" id="{{$surveyquestion->id}}">
		        <input type="hidden" name="survey_id" value="{{$surveyquestion->survey_id}}">
		        <input type="hidden" name="question_id" value="{{$surveyquestion->question_type_id}}">
		        <h2 name="question">{{$surveyquestion->question}}</h2>

                    @switch($surveyquestion->questionType->name)

                        @case('text')
                        <div class="row">
                            <div class="col-sm-12 form-group mb-3">
                                <input placeholder="type your text here" id="{{$surveyquestion->id}}option-choice" name="{{$surveyquestion->id}}textName" class="text_type" value="">
                            </div>
                        </div>
                        @break
                        @case('Number')
                        <div class="row">
                            <div class="col-sm-12 form-group mb-3">
                            <input type="number" placeholder="Type your value" required name="number" min="0"  step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="">
                            </div>
                        </div>
                        @break
{{--                    @case('Number')--}}
{{--                    <div>--}}
{{--                        <input type="number" id="quantity" name="number" min="1" max="5">--}}
{{--                    </div>--}}
{{--                    @break--}}

                        @case('textarea')
                        <div class="row">
                            <div class="col-sm-12 form-group mb-3">
                                <textarea placeholder="type your textarea here" name="{{$surveyquestion->id}}textareaName" class="text_type" id="{{$surveyquestion->id}}option-choice" rows="3"></textarea>
                            </div>
                        </div>
                        @break

                        @case('Checkbox')
                        <div class="row">
                            <div class="col-sm-12 form-group mb-3">

                                @php
                                    $data =  Surveybuilders\Survey\Models\SurveyQuestion::where('id', $surveyquestion->id)->first();
                                     if($data->option_choice != null){
                                         $optionArray = explode("\r\n", $data->option_choice);
                                        }
                                @endphp
                                @foreach($optionArray as $key => $options)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               name="{{$data->id}}{{$key}}customCheck"
                                               id="{{$data->id}}-{{$key}}-customCheck">
                                        <label class="custom-control-label"
                                               for="{{$data->id}}-{{$key}}-customCheck">{{$options}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @break
                        @case('Radio')
                        <div class="row">
                            <div class="col-sm-12 form-group mb-3">
                                {{--   <label for="option-choice" class="mb-1"><strong>{{$surveyquestion->question}}</strong></label>--}}
                                @php
                                    $data =  Surveybuilders\Survey\Models\SurveyQuestion::where('id', $surveyquestion->id)->first();
                                     if($data->option_choice != null){
                                         $optionArray = explode("\r\n", $data->option_choice);
                                        }
                                @endphp
                                @foreach($optionArray as $key => $options)

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input"
                                               name="{{$data->id}}{{$key}}customCheck"
                                               id="{{$data->id}}-{{$key}}-customCheck">{{$options}}
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @break
                        @case('Dropdown')
                        @php
                            $data =  Surveybuilders\Survey\Models\SurveyQuestion::where('id', $surveyquestion->id)->first();
                             if($data->option_choice != null){
                                 $optionArray = explode("\r\n", $data->option_choice);
                                }
                        @endphp
                        <div class="col-sm-12 form-group mb-3">
                            <select class="form-select" name="{{$data->id}}Dropdown" aria-label="Default select example">
                                <option value="" disabled="disabled">--Choose options--</option>
                                @foreach($optionArray as $key => $options)
                                    <option value="{{$options}}">{{$options}}</option>
                                @endforeach
                            </select>
                        </div>
                        @break
                        @default
                        <span class="status">default</span>
                    @endswitch
		        </div>
		        @endforeach
		    </div>

                 <!-- Button trigger modal -->
                    <button type="button" id="lauch" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hidden>
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                        <div class="modal fade right" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <p id="question_label"></p>
                                    </div>
                                    <div class="modal-body">
                                        <form id="textField">
                                            @csrf
                                            <h6>Question</h6>
                                            <textarea class="question_space" id="question" name="question"></textarea>
                                            <input type="hidden" name="id" id="id" value="">
                                            <input type="hidden" id="question_type_id" name="question_type_id">
                                            <input type="hidden" id="survey_id" name="survey_id" value="{{$survey_id}}">

                                            <div id="option-choice">

                                            </div>

                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" id="savebtn" class="btn btn-primary" onclick="newsaveData()">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                 <!-------PREVIEW SURVEY------>

                 @if(isset($preview_survey))
                 <div class="modal fade down" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true" style="padding: 29px;">
                            <div class="modal-dialog down">
                                <div class="modal-content down">
                                    <div class="modal-header down">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body down">
                           <div class="card" id="preview_cardBody" style="background:#8080801f;padding:4.5rem!important">
                                    @foreach($preview_survey as $preview_survey)
                                    <div class="card-body" id="preview_card{{$preview_survey->id}}">
                                    <input type="hidden" name="id" id="{{$preview_survey->id}}">
                                    <input type="hidden" name="survey_id" value="{{$preview_survey->survey_id}}">
                                    <input type="hidden" name="question_id" value="{{$preview_survey->question_type_id}}">
                                    <h2 name="question">{{$preview_survey->question}}</h2>

                                    @switch($preview_survey->questionType->name)
                                      @case('text')
                                      <div class="row">
                                       <div class="col-sm-12 form-group mb-3">
                                        <input placeholder="type your text here" class="text_type">
                                       </div>
                                      </div>
                                      @break

                                      @case('textarea')
                                      <div class="row">
                                       <div class="col-sm-12 form-group mb-3">
                                        <textarea placeholder="type your textarea here" class="text_type"></textarea>
                                        </div>
                                      </div>
                                      @break
                                      @case('Checkbox')
                                        <div class="row">
                                            <div class="col-sm-12 form-group mb-3">

                                                @php
                                                    $data =  Surveybuilders\Survey\Models\SurveyQuestion::where('id', $preview_survey->id)->first();
                                                     if($data->option_choice != null){
                                                         $optionArray = explode("\r\n", $data->option_choice);
                                                        }
                                                @endphp
                                                @foreach($optionArray as $key => $options)
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               name="{{$data->id}}{{$key}}customCheck"
                                                               id="{{$data->id}}-{{$key}}-customCheck">
                                                        <label class="custom-control-label"
                                                               for="{{$data->id}}-{{$key}}-customCheck">{{$options}}</label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        @break

                                            @case('Radio')
                                            <div class="row">
                                                <div class="col-sm-12 form-group mb-3">
                                                    {{--                                <label for="option-choice" class="mb-1"><strong>{{$surveyquestion->question}}</strong></label>--}}
                                                    @php
                                                        $data =  Surveybuilders\Survey\Models\SurveyQuestion::where('id', $preview_survey->id)->first();
                                                         if($data->option_choice != null){
                                                             $preview_survey = explode("\r\n", $data->option_choice);
                                                            }
                                                    @endphp
                                                    @foreach($preview_survey as $key => $options)

                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                   name="{{$data->id}}customCheck"
                                                                   id="{{$data->id}}-{{$key}}-customCheck">{{$options}}
                                                            <label class="form-check-label" for="{{$data->id}}-{{$key}}-customCheck"></label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @break

                                            @case('Number')
                                             <div class="row">
                                                <div class="col-sm-12 form-group mb-3">
                                                <input type="number" step="0.01" class="form-control" id="decimalInput" placeholder="Enter decimal number">
                                            </div>
                                            </div>


                                            {{--<input type="number" placeholder="type your number here" class="text_type">--}}
                                            @break
                                            @case('Dropdown')
                                            @php
                                                $data =  Surveybuilders\Survey\Models\SurveyQuestion::where('id', $surveyquestion->id)->first();
                                                 if($data->option_choice != null){
                                                     $optionArray = explode("\r\n", $data->option_choice);
                                                    }
                                            @endphp
                                            <div class="col-sm-12 form-group mb-3">
                                                <select class="form-select" name="{{$data->id}}Dropdown" aria-label="Default select example">
                                                    <option value="" disabled="disabled">--Choose options--</option>
                                                    @foreach($optionArray as $key => $options)
                                                        <option value="{{$options}}">{{$options}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @break

                                      @default
                                        <span class="status">default</span>
                                    @endswitch
                                    </div>
                                    @endforeach
                        </div>

                        </div>
                      </div>
                    </div>
                @endif
