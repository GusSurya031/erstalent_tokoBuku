<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->roles()->where('role_name', $role)->exists()) {
                return $next($request);
            }
            abort(403, 'This section is authorized.');
        }
        abort(403, 'This section is authorized.');
    }
}
