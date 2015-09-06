<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminAuthenticate
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (!$this->auth->guest()) {
            if($this->userHasPermission($request->user())) {

                return $next($request);
            }
        }

        return redirect()->guest('auth/login');
    }

    protected function userHasPermission($user)
    {
        if($user->is_admin) {

            return true;
        }

        return false;
    }
}
