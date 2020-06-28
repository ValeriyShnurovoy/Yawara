<?php

namespace App\Http\Middleware;

use Closure;
use App\Configuration;

class ACL
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
        if ($request->user()) {

            $controllerPath = explode('/', $request->path());

            if ('admin' === $controllerPath[0]) {

                $controllerName = 'dashboard';

                if (isset($controllerPath[1])) {
                    $controllerName = $controllerPath[1];
                }

                $data = [
                    'controller' => $controllerName,
                    'role_id' => $request->user()->role_id,
                ];

                $access = Configuration::where($data)->first();

                if (isset($access->id)) {

                    return $next($request);

                } elseif ('dashboard' === $controllerName) {

                    return redirect('home');

                } else {

                    return redirect('admin');

                }
            }
        }

        return redirect('login');
    }
}
