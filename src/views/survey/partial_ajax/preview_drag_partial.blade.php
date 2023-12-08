                               @foreach($afterdrag as $preview_question)
                                   <div class="card-body" id="preview_card{{ $preview_question->id }}">
                                       <input type="hidden" name="id" id="{{ $preview_question->id }}">

                                       <input type="hidden" id="surveyId" name="survey_id"
                                              value="{{ $preview_question->survey_id }}">
                                       <input type="hidden" name="question_id" value="{{ $preview_question->id }}">
                                       <h2 name="question">{{ $preview_question->question }}</h2>


                                       @switch($preview_question->questionType->name)
                                           @case('text')
                                           <div class="row">
                                               <div class="col-sm-12 form-group mb-3">
                                                   <input placeholder="type your text here" class="text_type"
                                                          name="{{ $preview_question->id }}response" id="decimalInput-{{ $preview_question->id }}response">
                                               </div>
                                           </div>
                                           @break

                                           @case('textarea')
                                           <div class="row">
                                               <div class="col-sm-12 form-group mb-3">
                                                    <textarea placeholder="type your textarea here"
                                                              id="decimalInput-{{ $preview_question->id }}response"
                                                              name="{{ $preview_question->id }}response"
                                                              class="text_type"></textarea>
                                               </div>
                                           </div>
                                           @break

                                           @case('Checkbox')
                                           <div class="row">
                                               <div class="col-sm-12 form-group mb-3">
                                                   @php
                                                       $data = Surveybuilders\Survey\app\Models\SurveyQuestion::where('id', $preview_question->id)->first();
                                                       if ($data->option_choice != null) {
                                                           $optionArray = explode("\r\n", $data->option_choice);
                                                       }
                                                   @endphp
                                                   @foreach ($optionArray as $key => $option)
                                                       <div class="custom-control custom-checkbox">
                                                           <input type="checkbox" class="custom-control-input"
                                                                  name="{{ $preview_question->id }}response[]"
                                                                  value="{{ $option }}"
                                                                  id="{{ $data->id }}-{{ $key }}-customCheck">
                                                           <label class="custom-control-label"
                                                                  for="{{ $data->id }}-{{ $key }}-customCheck">{{ $option }}</label>
                                                       </div>
                                                   @endforeach
                                               </div>
                                           </div>
                                           @break

                                           @case('Radio')
                                           <div class="row">
                                               <div class="col-sm-12 form-group mb-3">
                                                   @php
                                                       $data = Surveybuilders\Survey\app\Models\SurveyQuestion::where('id', $preview_question->id)->first();
                                                       if ($data->option_choice != null) {
                                                           $options = explode("\r\n", $data->option_choice);
                                                       }
                                                   @endphp
                                                   @if (isset($options))
                                                       @foreach ($options as $key => $option)
                                                           <div class="form-check">
                                                               <input type="radio" class="form-check-input"
                                                                      name="{{ $preview_question->id }}response"
                                                                      value="{{ $option }}"
                                                                      id="decimalInput-{{ $data->id }}-{{ $key }}-response"
                                                                   {{ $option == $preview_question->response ? 'checked' : '' }}>
                                                               <label class="form-check-label"
                                                                      for="{{ $data->id }}-{{ $key }}-response">{{ $option }}</label>
                                                           </div>
                                                       @endforeach
                                                   @endif
                                               </div>
                                           </div>
                                           @break



                                           @case('Number')
                                           <div class="row">
                                               <div class="col-sm-12 form-group mb-3">
                                                   <input type="number"
                                                          name="{{ $preview_question->id }}response" step="0.01"
                                                          class="form-control" id="decimalInput-{{ $preview_question->id }}response"
                                                          placeholder="Enter decimal number">
                                               </div>
                                           </div>
                                           @break


                                           @case('Dropdown')
                                           @php
                                               $data = Surveybuilders\Survey\Models\SurveyQuestion::where('id', $preview_question->id)->first();
                                               if ($data->option_choice != null) {
                                                   $options = explode("\r\n", $data->option_choice);
                                               }
                                           @endphp
                                           <div class="col-sm-12 form-group mb-3">
                                               <select class="form-select" name="dropdown"
                                                       aria-label="Default select example">
                                                   <option value="" disabled="disabled">--Choose options--</option>
                                                   @foreach ($options as $option)
                                                       <option value="{{ $option }}">{{ $option }}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                           @break

                                           @default
                                           <span class="status">default</span>
                                       @endswitch
                                   </div>
                                    @endforeach
                           <button type="submit" class="btn btn-success">Submit</button>
