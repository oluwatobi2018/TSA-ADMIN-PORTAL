<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     */
    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // Return JSON response for API requests
        if ($request->expectsJson()) {

            // Handle validation exceptions
            if ($exception instanceof ValidationException) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $exception->errors(),
                ], 422);
            }

            // Handle not found routes
            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                    'message' => 'Resource not found',
                ], 404);
            }

            // Handle authentication failures
            if ($exception instanceof AuthenticationException) {
                return response()->json([
                    'message' => 'Unauthenticated',
                ], 401);
            }

            // Default JSON error
            return response()->json([
                'message' => $exception->getMessage() ?: 'Server Error',
            ], method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500);
        }

        // Default behavior for web requests
        return parent::render($request, $exception);
    }
}
