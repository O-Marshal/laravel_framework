<?php

namespace Ckryo\Framework\Exceptions;

use Ckryo\Framework\Contracts\ExceptionResponseable;
use Ckryo\Framework\Http\Request;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler {
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
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception) {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     * @throws HttpFormValidationException
     * @throws HttpRouteNotAllowedException
     * @throws \Ckryo\Framework\Exceptions\Exception
     */
    public function render($request, Exception $exception) {


        if (Request::createFromBase($request)->jsonResponse()) {
            switch (true) {
                case $exception instanceof ExceptionResponseable:
                    return $exception->toResponse();
                case $exception instanceof ValidationException:
                    throw new HttpFormValidationException($exception);
                case $exception instanceof MethodNotAllowedHttpException:
                    throw new HttpRouteNotAllowedException($exception);
                default:
                    throw new \Ckryo\Framework\Exceptions\Exception($exception);
            }
        }

        return parent::render($request, $exception);
    }
}
