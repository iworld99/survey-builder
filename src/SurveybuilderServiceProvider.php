<?php

namespace Surveybuilders\Survey;

use Illuminate\Support\ServiceProvider;

class SurveybuilderServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //  Route here...
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // View here...
        $this->loadViewsFrom(__DIR__ . '/views/survey', 'survey');
        $this->loadViewsFrom(__DIR__ . '/views/survey/partial_ajax', 'survey.partial_ajax');
        // Migration here...
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

    }
}
