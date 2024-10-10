<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Arr;

class Authenticate extends Middleware
{
    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  array $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request, $guards)
        );
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  array $guards
     * @return null|string
     */
    protected function redirectTo($request, $guards = null)
    {
        if (!$request->expectsJson()) {
            $guard = Arr::first($guards, null, config('auth.defaults.web'));
            $route = config("auth.guards.$guard.routes.login");

            if (empty($route)) {
                return '/';
            }

            return route($route);
        }
    }
}
