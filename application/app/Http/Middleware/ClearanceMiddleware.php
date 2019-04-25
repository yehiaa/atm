<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        Session::flash('warning', 'For DEMO ONLY Don\'t use in production..');

        $sections = explode('@', $classActionName);
        //based on controller name
        $modelName = lcfirst(substr($sections[0] ?? '', 0, -10));
        $actionName = $sections[1] ?? '';

        $permissionActionMap = [
            'update'=> 'edit', 'edit'=> 'edit',
            'create'=> 'add', 'store'=> 'add',
            'destroy'=> 'remove', 'index'=> 'list'
        ];

        $ignoredControllers = ['home'];
        $permission = $modelName . ' ' . ($permissionActionMap[$actionName] ?? '');
        if (Auth::user() && !Auth::user()->can($permission) && ! in_array($modelName, $ignoredControllers))
        {
            abort('401');
        }
        return $next($request);
    }
}
