<?php namespace Netinteractive\Acl\Middleware;

use Closure;

class Route
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Perform action

        return $response;
    }
}