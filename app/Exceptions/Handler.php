<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class Handler extends ExceptionHandler
{
    protected function renderTokenMismatchException(TokenMismatchException $e): \Illuminate\Http\Response
    {
        return response()->view('errors.419', [], 419);
    }

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (\Exception $e, $request) {
            if ($this->isHttpException($e)) {
                return $this->renderHttpException($e);
            } elseif ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                abort(404);
            }
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AccessDeniedHttpException) {
            return response()->view('errors.403', [], 403);
        } elseif ($exception instanceof BadRequestHttpException) {
            return response()->view('errors.400', [], 400);
        } elseif ($exception instanceof TooManyRequestsHttpException) {
            return response()->view('errors.429', [], 429);
        }

        return parent::render($request, $exception);
    }
}
