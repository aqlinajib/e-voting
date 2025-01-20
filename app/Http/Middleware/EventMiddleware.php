<?php

namespace App\Http\Middleware;

use Closure;

class EventMiddleware
{
    public function handle($request, Closure $next)
    {
       // If the request method is PUT or PATCH, try to get the id_event from the request data
       if ($request->isMethod('put') || $request->isMethod('patch')) {
        $id_event = $request->input('id_event');
    } else {
        // Otherwise, try to get the id_event from the route parameters
        $id_event = $request->route('id_event');
    }

    // Share the id_event to all views
    view()->share('id_event', $id_event);

    return $next($request);
    }
}
