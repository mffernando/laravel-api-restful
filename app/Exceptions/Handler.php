<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     */
    public function render($request, Exception $exception)
    {
        //replace 404 response with a Json response
        if ($exception instanceof ModelNotFoundException &&
            $request->wantsJson()){
          return response()->json([
            'data' => 'Resource not found',
          ], 404); //404 return not found
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response
     *
     */
     protected function unauthenticated($request, authenticationException $exception){
       return response()->json(['error' => 'Unauthenticated!'], 401);
     }
}
