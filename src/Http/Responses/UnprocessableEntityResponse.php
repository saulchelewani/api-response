<?php


namespace TNM\ApiResponse\Http\Responses;


class UnprocessableEntityResponse extends HttpResponse
{
    public function getCode(): int
    {
        return 422;
    }
}
