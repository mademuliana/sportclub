<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class MemberMiddleware
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
<<<<<<< HEAD
        if ($request->user() && $request->user()->role > '3')
=======
        if ($request->user() && $request->user()->role != '3')
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
        {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
