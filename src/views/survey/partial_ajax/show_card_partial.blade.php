
	@if(isset($data))
		@php
	    $jsonString = json_encode($data);
		$data = json_decode($jsonString);
		if($data->option_choice != null){
            $optionArray = explode("\r\n", $data->option_choice);
        }

	    @endphp
		<div class="card-body draggable"  id="card{{$data->id}}" onclick="editmodal({{$data->id}},{{$data->survey_id}})" draggable="true" data-order-weightage="{{$data->order_weightage}}" data-id="{{$data->id}}" data-survey-id="{{$data->survey_id}}">
        <input type="hidden" name="id" id="{{$data->id}}">
        <input type="hidden" name="survey_id" value="{{$data->survey_id}}">
        <input type="hidden" name="question_id" value="{{$data->question_type_id}}">
        <input type="hidden" class="order-weightage-input" value="{{$data->order_weightage}}" step="1">
        <h2 name="question">{{$data->question}}</h2>


        @switch($question_data->name)
            @case('text')
            <div class="row">
                <div class="col-sm-12 form-group mb-3">
                    <input placeholder="type your text here" id="{{$data->id}}option-choice" name="{{$data->id}}textName" class="text_type" value="">
                </div>
            </div>
            @break
            @case('textarea')
            <div class="row">
                <div class="col-sm-12 form-group mb-3">
                    <textarea placeholder="type your textarea here" name="{{$data->id}}textareaName" class="text_type" id="{{$data->id}}option-choice" rows="3"></textarea>
                </div>
            </div>
            @break
            @case('Checkbox')
            <div class="row">
                <div class="col-sm-12 form-group mb-3">
                    @foreach($optionArray as $key => $options)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="{{$data->id}}{{$key}}customCheck" id="{{$data->id}}-{{$key}}-customCheck">
                            <label class="custom-control-label" for="{{$data->id}}-{{$key}}-customCheck">{{$options}}</label>
                        </div>
                    @endforeach

                </div>
            </div>
            @break
            @case('Radio')
                        <div class="row">
                            <div class="col-sm-12 form-group mb-3">
                                @php
                                    $data =  Surveybuilders\Survey\app\Models\SurveyQuestion::where('id', $data->id)->first();
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

                @case('Number')
                <div>
                    <input type="number" placeholder="type your value" required id="{{$data->id}}" name="{{$data->id}}" min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="">
                </div>
                @break

            @case('dropdown')
            <div class="col-sm-12 form-group mb-3">
                <label for="option-choice" class="mb-1"><strong>{{$data->question}}</strong></label>
                <textarea class="form-control" name="optionChoice" id="option-choice" rows="3" placeholder="Enter one choice par line"></textarea>
            </div>
            @break
        @endswitch
        </div>
    @endif
