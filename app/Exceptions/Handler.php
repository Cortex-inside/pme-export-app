<?php

namespace PMEexport\Exceptions;

use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->view('errors.401', [], 401);
        } elseif ($exception instanceof UnauthorizedException) {
            return response()->view('errors.401', [], 401);
        } elseif ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.401', [], 401);
        } elseif ($exception instanceof ValidationException) {
            return response()->view('errors.401', [], 401);
        } elseif ($exception instanceof MethodNotAllowedHttpException) {
            return response()->view('errors.401', [], 401);
        } elseif ($exception instanceof AccessDeniedHttpException) {
            return response()->view('errors.401', [], 401);
        } else {
            return parent::render($request, $exception);
        }
    }
}
