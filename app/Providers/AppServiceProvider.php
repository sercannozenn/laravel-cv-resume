<?php

namespace App\Providers;

use App\Models\PersonalInformation;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\View;
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
        $socialMediaData = SocialMedia::where('status', 1)->get();
        $personal = PersonalInformation::find(1);
        View::share('socialMediaData', $socialMediaData);
        View::share('personal', $personal);
    }
}
