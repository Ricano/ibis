<?php

namespace App\Providers;

use App\Ata;
use App\Meeting;
use App\MeetingUser;
use App\Observers\AtaObserver;
use App\Observers\MeetingObserver;
use App\Observers\MeetingUserObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;

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
        User::observe(UserObserver::class);
    }
}
