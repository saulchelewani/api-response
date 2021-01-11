<?php


namespace TNM\ApiResponse\Http\Responses;


use Illuminate\Http\Response;

class ObjectNotFoundResponse extends HttpResponse
{
    public function getCode(): int
    {
        return Response::HTTP_NOT_FOUND;
    }
}
