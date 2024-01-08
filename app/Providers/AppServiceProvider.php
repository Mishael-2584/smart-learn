<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        //
        
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('layouts.navbar', function ($view) {
            if (session()->get('isAuthenticated') == true) {
                if (session()->get('role') === 4) {
                    $user = Student::find(session()->get('id'));
                    $view->with('user', $user);
                } elseif (session()->get('role') === 3) {
                    $user = Lecturer::find(session()->get('id'));
                    $view->with('user', $user);
                } elseif (session()->get('role') === 2) {
                    $user = Admin::find(session()->get('id'));
                    $view->with('user', $user);
                }
            }
        });
    }
}
