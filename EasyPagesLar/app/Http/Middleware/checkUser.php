<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Company;

use Closure;

class checkUser
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
        if ($request->id == Auth::user()->id) {
            return $next($request);
        }
        else
        {
            $company = Company::where('user_id', $request->id)->first();
            if($company !== null)
            {
                return redirect('/company/'.$company->company_id);  
            }
            $profile = Profile::where('user_id', $request->id)->first();
            if($profile !== null)
            {
                return redirect('/profile/'.$profile->profile_id);  
            }
        }
        return redirect('/');  
    }
}
