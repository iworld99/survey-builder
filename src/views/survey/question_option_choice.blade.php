<div>
    @switch($question_data->name)
    @case('text')
           <input type="hidden" name="optionChoice" id="option-choice" value=""></input>
        @break
      @case('textarea')
           <input type="hidden" name="optionChoice" id="option-choice" value=""></input>
        @break
        @case('Checkbox')
        <div class="row">
            <input type="hidden" name="option_choice_validate" value="1">
            <div class="col-sm-12 form-group mb-5">
                <label for="option-choice" class="mb-1"><strong>Choices</strong></label>
                <textarea class="form-control" name="optionChoice" id="option-choice" rows="3" placeholder="Enter one choice par line">@if(isset($old_value)){{$old_value->option_choice}}@endif</textarea>
            </div>
        </div>
        @break
        @case('Dropdown')
        <input type="hidden" name="option_choice_validate" value="1">
        <div class="col-sm-12 form-group mb-5">
            <label for="option-choice" class="mb-1"><strong>Choices</strong></label>
            <textarea class="form-control" name="optionChoice" id="option-choice" rows="3" placeholder="Enter one choice par line">@if(isset($old_value)){{$old_value->option_choice}}@endif</textarea>
        </div>
        @break
        @case('Radio')
        <input type="hidden" name="option_choice_validate" value="1">
        <div class="col-sm-12 form-group mb-5">
            <label for="option-choice" class="mb-1"><strong>Answer</strong></label>
            <p>Choices</p>
            <div>
                <textarea class="form-control" name="optionChoice" id="option-choice" rows="3" placeholder="Enter one choice par line">@if(isset($old_value)){{$old_value->option_choice}}@endif</textarea>
            </div>
        </div>
        @break

        @case('Number')
        <div>
            <input type="hidden" name="optionChoice" id="option-choice" value=""></input>
        </div>
        @break
    @endswitch

</div>
