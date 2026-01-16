<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Check if user is authenticated
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        // Check if user has the required role
        if (auth()->user()->role !== $role) {
            // If user doesn't have the required role, redirect to their dashboard
            if (auth()->user()->role === 'customer_relationship_management') {
                return redirect()->route('AO_KNITTING.customer_relationship_management.dashboard');
            } else {
                return redirect()->route('AO_KNITTING.document_management_system.dashboard');
            }
        }

        return $next($request);
    }
}
