<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDynamic
{
    public function handle(Request $request, Closure $next, ...$blockedRoles)
    {
        if (!Auth::guard('admin')->check()) {
            return response()->json(['error' => 'Authentication failed']);
        } else{
            $admin = Auth::guard('admin')->user();
            if (!$admin || empty($request->cookie('admin_hash')) || $request->cookie('admin_hash') !== $admin->admin_hash) {
                Auth::guard('admin')->logout();
                return response()->json(['error' => 'Authentication failed']);
            }
        }
        return $next($request);
    }
}