<?php

namespace App\Http\Middleware;

use Closure;

class RolesMiddilerware
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
        foreach ($this->roles as $role)
        {
            if ($role == 'superadministrator')
            {
                redirect('manage.dashboard');
            }
        }

            return $next($request);
    }
}
