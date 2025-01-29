<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{


    public function render($request, Throwable $exception)
{
    // Check if the exception is a 404 (Not Found)
    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
        // Redirect to the home page or a specific route (in this case 'car')
        return redirect()->route('car');
    }

    // Handle JSON responses for other types of errors
    if ($request->expectsJson()) {
        return response()->json([
            'message' => $exception->getMessage(),
        ], $exception->getCode() ?: 500);
    }

    // Default behavior for other exceptions
    return parent::render($request, $exception);
}

    // app/Exceptions/Handler.php








    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
