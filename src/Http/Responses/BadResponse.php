<?php


namespace TNM\ApiResponse\src\Http\Responses;


use TNM\ApiResponse\Http\HttpResponse;

class BadResponse extends HttpResponse
{
    public function getCode(): int
    {
        return 400;
    }
}
