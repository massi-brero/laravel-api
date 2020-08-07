<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException(HttpRequest $request, \Exception $exception)
    {
        if ($this->isModel($exception)) {
            return $this->getModelResponse();
        }

        if ($this->isHttp($exception)) {
            return $this->getHttpResponse();
        }

        return parent::render($request, $exception);
    }

    private function isModel(\Exception $exception)
    {
        return $exception instanceof ModelNotFoundException;
    }

    private function isHttp(\Exception $exception)
    {
        return $exception instanceof NotFoundHttpException;
    }

    private function getModelResponse()
    {
        return response()->json([
            'error' => 'Model not found'
        ], Response::HTTP_NOT_FOUND);
    }

    private function getHttpResponse()
    {
        return response()->json([
            'error' => 'Incorrect Route'
        ], Response::HTTP_NOT_FOUND);
    }
}
