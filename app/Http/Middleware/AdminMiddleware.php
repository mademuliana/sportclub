<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AdminMiddleware
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
        if ($request->user() && $request->user()->role > '2')
=======
        if ($request->user() && $request->user()->role != '2')
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
        {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
