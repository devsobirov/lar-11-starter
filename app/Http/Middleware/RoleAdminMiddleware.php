<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        abort_if(
            !auth()->id() || !auth()->user()->isAdmin(),
            403,
            'Хукуклар етарли эмас!'
        );
        return $next($request);
    }
}
