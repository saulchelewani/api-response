<?php


namespace TNM\ApiResponse\Http\Responses;



class BadResponse extends HttpResponse
{
    public function getCode(): int
    {
        return 400;
    }
}
