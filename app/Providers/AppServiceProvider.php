<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('UpperExist', function ($attribute, $value, $parameters, $validator) {
            return preg_match('#[A-Z]#', $value);
        });

        Validator::extend('LowerExist', function ($attribute, $value, $parameters, $validator) {
            return preg_match('#[a-z]#', $value);
        });

        Validator::extend('DigitExist', function ($attribute, $value, $parameters, $validator) {
            return preg_match('#[0-9]#', $value);
        });

        Validator::extend('SpecialExist', function ($attribute, $value, $parameters, $validator) {
            return preg_match('#[\W]#', $value);
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
        $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
