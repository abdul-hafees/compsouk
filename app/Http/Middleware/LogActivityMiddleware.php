<?php

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogActivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userID = auth()->id() ?? '';
        $method = $request->method();
        $url = $request->fullUrl();
        $ip = $request->ip();
        $params = json_encode($request->all());

        $log = new AuditLog();
        $log->admin_id = $userID;
        $log->method = $method;
        $log->url = $url;
        $log->ip = $ip;
        $log->params = $params;
        $log->save();

        return $next($request);
    }
}
