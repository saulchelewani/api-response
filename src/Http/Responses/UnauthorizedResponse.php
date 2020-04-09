<?php


namespace TNM\ApiResponse\src\Http\Responses;


use Illuminate\Http\Response;
use TNM\ApiResponse\Http\HttpResponse;

class UnauthorizedResponse extends HttpResponse
{
    public function getCode(): int
    {
        return Response::HTTP_UNAUTHORIZED;
    }

    public function getMessage(): string
    {
        return "Incorrect credentials provided";
    }
}
