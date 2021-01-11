<?php


namespace TNM\ApiResponse\Http\Responses;


use Illuminate\Http\Response;

class PreconditionFailedResponse extends HttpResponse
{
    public function getCode(): int
    {
        return Response::HTTP_PRECONDITION_FAILED;
    }
}
