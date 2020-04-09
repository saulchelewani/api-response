<?php


namespace TNM\ApiResponse\src\Http\Responses;


use Illuminate\Http\Response;
use TNM\ApiResponse\Http\HttpResponse;

class ObjectCreatedResponse extends HttpResponse
{
    public function getCode(): int
    {
        return Response::HTTP_CREATED;
    }

    public function getMessage(): string
    {
        return $this->message ? $this->message : "Object created successfully";
    }
}
