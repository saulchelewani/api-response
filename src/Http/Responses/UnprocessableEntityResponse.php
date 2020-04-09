<?php


namespace TNM\ApiResponse\Http;


class UnprocessableEntityResponse extends HttpResponse
{
    public function getCode(): int
    {
        return 422;
    }
}
