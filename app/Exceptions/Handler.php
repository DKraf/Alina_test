<?php

namespace App\Exceptions;

use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\SanctumServiceProvider;
use Meilisearch\Exceptions\CommunicationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use App\Traits\ResponseJsonWithHttpStatus;

class Handler extends ExceptionHandler
{
    use ResponseJsonWithHttpStatus;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {

        if ($e instanceof ThrottleRequestsException) {
            return $this->error('Слишком много попыток', 422);
        }

        if ($e instanceof \Illuminate\Auth\AuthenticationException) {
            return $this->error('Пользователь не Авторизован.', 401);
        }

        if ($e instanceof NotFoundHttpException) {
            return $this->error( 'Страница не найдена', 404);
        }

        if ($e instanceof SanctumServiceProvider) {
            return $this->error( 'Ошибка авторизации', 401);
        }

        if ($e instanceof QueryException) {
            return $this->error( $e->getMessage(), 500);
        }

        if ($e instanceof ValidationException) {
            return response()->json(['status' => false, 'message' => $e->errors(), 'data' => null ], 400);
        }

        if ($e instanceof \Exception) {
            return response()->json(['status' => false, 'message' => $e->getMessage(), 'data' => null ], 400);

        }

        return parent::render($request, $e);
    }
}
