<?php

namespace App\Http\Middleware;

use Closure,Session;

class CmsDashBoard
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
        if(Session::has("is_admin")){
            return $next($request);
        }else{
            return redirect("user/login")->withErrors("you can't allowed to see CMS"); //למה כשאני משנה  ב REDIRECT 
                                                                                                //  וגם בהודעה -לא מוצגת ההודעה logout ל
        }
    }
}
