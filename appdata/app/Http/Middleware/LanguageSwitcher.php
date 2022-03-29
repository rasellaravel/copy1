<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $agent = new \Jenssegers\Agent\Agent;

        $is_desktop = $agent->isDesktop();

        if ($is_desktop) {
            session()->put('is_screen', 'web');
        } else {
            session()->put('is_screen', 'app');
        }

        if (!session()->has('locale')) {
            session()->put('locale', 'lt');
        }
        app()->setlocale(session()->has('locale') ? session()->get('locale') : 'lt');
        return $next($request);
    }
}
