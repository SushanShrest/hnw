<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AssignRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if ($request->user()) {
            // Get the user's type
            $userType = $request->user()->type;

            // Assign role based on user type
            switch ($userType) {
                case 'admin':
                    $role = Role::where('name', 'admin')->first();
                    break;
                case 'doctor':
                    $role = Role::where('name', 'doctor')->first();
                    break;
                default:
                    $role = Role::where('name', 'user')->first();
                    break;
            }

            // If role is not found, log an error and abort
            if (!$role) {
                \Log::error("Role not found for user type: $userType");
                abort(500, 'Internal Server Error');
            }

            // Assign the role to the user
            $request->user()->assignRole($role);
        }

        return $next($request);
    }
}
