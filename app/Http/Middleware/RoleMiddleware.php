<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles  Danh sách role cách nhau bởi dấu phẩy, ví dụ: "admin,student"
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        // Tách danh sách roles thành mảng
        $allowedRoles = explode(',', $roles);

        // Kiểm tra nếu người dùng chưa đăng nhập hoặc role không khớp
        if (!auth()->check() || !in_array(auth()->user()->role, $allowedRoles)) {
            return response()->json(['message' => 'Bạn không có quyền truy cập'], 403);
        }

        return $next($request);
    }
}
