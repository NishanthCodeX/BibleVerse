<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect(route('admin.login'));
        } else
        {
            $admin = Auth::guard('admin')->user();
            if (!$admin || empty($request->cookie('admin_hash')) || $request->cookie('admin_hash') !== $admin->admin_hash) {
                Auth::guard('admin')->logout();
                return redirect(route('admin.login'))->with('error', 'Please log in to continue.');
            }
        }
        return $next($request);
    }
}