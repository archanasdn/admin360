<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPrivileges
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user = Auth::user(); return Auth::user();

        // // Check if the user has the required privilege
        // if (!$user || !$user->hasPrivilege()) {
        //     // Return a response indicating the user doesn't have permission
        //     return response()->json(['error' => 'You do not have permission to access this resource.'], 403);
        // }

        // Allow the request to proceed
        return $next($request);
    }
}
