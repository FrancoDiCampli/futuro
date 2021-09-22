<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('student', function () {
           return user()->hasRole('student');
        });
        Blade::if('recruiter', function () {
            return user()->hasRole('recruiter');
         });
        Blade::if('enterprise', function () {
        return user()->hasRole('enterprise');
        });

        Collection::macro('byStatus', function ($status) {
            return $this->filter(function ($value) use ($status) {
                return $value->status == $status;
            });
        });
    }
}
