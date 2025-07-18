<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\StaffLogin;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        \Log::info('Roles array:', $roles);

        if (!$user || !in_array($user->role, $roles)) {
            \Log::info('Access Denied', [
                'user_email' => $user?->email,
                'user_role' => $user?->role,
                'allowed_roles' => $roles,
                'role_match' => in_array($user?->role, $roles),
            ]);
            abort(403, 'Akses ditolak.');
        }
        // Hanya untuk role staff
        if ($user->role === 'staff') {
            StaffLogin::updateOrCreate(
                ['staff_id' => $user->id],
                ['last_login_at' => now()]
            );
        }

        return $next($request);
    }

}
