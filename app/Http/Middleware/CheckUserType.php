<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $allowedUserTypes)
    {
        $allowedUserTypes = explode(',', $allowedUserTypes);

        // Kiểm tra xem người dùng có quyền truy cập không
        if (in_array($request->user()->user_type, $allowedUserTypes)) {
            return $next($request);
        }
    
        abort(403, 'Bạn không có quyền truy cập.');
    }
}
