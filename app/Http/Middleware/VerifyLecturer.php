<?php

namespace App\Http\Middleware;

use App\Models\Lecturer;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyLecturer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        
    $lecturer = Lecturer::where('id', session('id'))->first(); 

    if ($lecturer->verified == 2) {
        return $next($request);
    }
    else{
        // If the lecturer is not verified, you can redirect them or return an appropriate response
        return back()->with('error', 'You can\'t access this page because your account is not verified.');

    }

    
    }
}
