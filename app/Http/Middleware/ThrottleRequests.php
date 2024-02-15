<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThrottleRequests
{
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle(Request $request, Closure $next, $maxAttempts = 60, $decayMinutes = 1)
    {
        $key = $this->resolveRequestSignature($request);

        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            return $this->buildResponse($maxAttempts, $request);
        }

        $this->limiter->hit($key, $decayMinutes * 60);

        $response = $next($request);

        return $this->addHeaders(
            $response, $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts)
        );
    }

    protected function resolveRequestSignature(Request $request)
    {
        return sha1(
            $request->method() . '|' . $request->server('SERVER_NAME') . '|' . $request->ip()
        );
    }

    protected function buildResponse($maxAttempts, Request $request)
    {
        $retryAfter = $this->limiter->availableIn($this->resolveRequestSignature($request));

        // Загружаем шаблон 429.blade.php
        $view = view('errors.429', ['retryAfter' => $retryAfter]);

        $response = new Response($view, 429);

        $response->headers->set('Retry-After', $retryAfter);

        return $response;
    }
    protected function addHeaders($response, $maxAttempts, $remainingAttempts)
    {
        $response->headers->add([
            'X-RateLimit-Limit' => $maxAttempts,
            'X-RateLimit-Remaining' => $remainingAttempts,
        ]);

        return $response;
    }

    protected function calculateRemainingAttempts($key, $maxAttempts)
    {
        return max(0, $maxAttempts - $this->limiter->attempts($key));
    }
}
