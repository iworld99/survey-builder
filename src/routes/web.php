<?php

use Illuminate\Support\Facades\Route;
//use Survey\Http\Controllers\SurveyController;


$namespace = 'Surveybuilders\Survey\app\Http\Controllers';
Route::group([
    'namespace' => $namespace,
    'prefix' => 'survey',
], function (){
    Route::get('/', 'SurveyController@index')->name('survey');
    Route::get('create', 'SurveyController@create')->name('survey/create');
    Route::post('store', 'SurveyController@store')->name('survey/store');
    // Route::get('show-survey/{id}', 'SurveyController@showsurvey')->name('survey.show-survey');

    Route::get('questiontype', 'SurveyController@showquestion')->name('questiontype');
    Route::post('question_store', 'SurveyController@questionstore')->name('survey.question_store');

    Route::get('show-survey/{id}', 'SurveyController@showsurvey')->name('survey.show-survey');

    Route::get('show-survey/edit/{id}', 'SurveyController@edit');

    Route::get('/load-partial/{id}', 'SurveyController@PartialviewData')->name('survey.view_partial_data');

    Route::post('/save-partial-data', 'SurveyController@PartialsaveData')->name('survey.save_partial_data');

    Route::get('question_option_choice', 'SurveyController@setOptionChoice')->name('survey.question_option_choice');

    Route::post('order_weigtage_change', 'SurveyController@orderWeightage')->name('survey.order_weigtage_change');

    Route::post('/save-partial-preview', 'SurveyController@previewsaveData')->name('save_preview_data');
    Route::get('/edit', 'SurveyController@editpreview')->name('edit');

});

