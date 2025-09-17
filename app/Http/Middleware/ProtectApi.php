<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProtectApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        // If bearer token not found, check query string
        if (! $token) {
            $token = $request->query('token');
        }

        // Validate the token
        if (! $token || ! $this->isValidToken($token)) {
            return response()->json([
                'message' => 'Invalid or missing token',
                'success' => false,
            ], 401);
        }

        return $next($request);
    }

    protected function isValidToken(string $token): bool
    {
        $validToken = env('API_TOKEN', '');

        if (empty($validToken) || ! hash_equals($validToken, (string) $token)) {
            return false;
        }

        return true;
    }
}
