<?php


namespace TNM\ApiResponse\Http\Responses;


use Illuminate\Http\Response;

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
