<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $classActionName = class_basename($request->route()->getActionName());
        $sections = explode('@', $classActionName);

        //based on controller name
        $modelName = lcfirst(substr($sections[0] ?? '', 0, -10));
        $actionName = $sections[1] ?? '';
//        print_r([$modelName, $actionName]);

        //@todo continue working on it
        $permission = $modelName . ' ' . $actionName;
//        if (!Auth::user()->can($permission))
//        {
//            abort('401');
//        }
        return $next($request);
    }
}
