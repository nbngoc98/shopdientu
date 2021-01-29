<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class admincheck extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // check login admin

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
//            return redirect('auth/login')->with('notifyError','Access denied!');
        }
    }
//    public function handle($request, Closure $next)
//    {
//        if (Auth::guard('admin-web')->check()) {
//            $is_admin = Auth::guard('admin-web')->user();
//            if ($is_admin) {
////                return $next($request);
//                return response()->view('admin');
////                echo 'abc';
//            } else {
//                return redirect('auth/login')->with('notifyError','Access denied!');
//            }
//        }
//        return redirect('auth/login')->with('notifyError','Access denied!');
//    }
}
