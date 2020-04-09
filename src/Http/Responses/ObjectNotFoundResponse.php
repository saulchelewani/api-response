<?php


namespace TNM\ApiResponse\src\Http\Responses;


use Illuminate\Http\Response;
use TNM\ApiResponse\Http\HttpResponse;

class ObjectNotFoundResponse extends HttpResponse
{
    public function getCode(): int
    {
        return Response::HTTP_NOT_FOUND;
    }
}
