<?php

namespace App\Http\Middleware;

use App\Models\PersonalInformation;
use App\Models\SocialMedia;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontDataShareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $socialMediaData = SocialMedia::where('status', 1)->orderBy('order', 'ASC')->get();
        $personal = PersonalInformation::find(1);
        View::share('socialMediaData', $socialMediaData);
        View::share('personal', $personal);

        return $next($request);
    }
}
