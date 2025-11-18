<?php

namespace App\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceJSONrequestHeader
{
    public function handle(Request $request, Closure $next): Response
  {
    $request->headers->set('Accept', 'application/json');

    return $next($request);
  }
}
