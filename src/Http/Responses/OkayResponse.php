<?php


namespace TNM\ApiResponse\Http;


use Illuminate\Http\Response;

class OkayResponse extends HttpResponse
{
    public function getMessage(): string
    {
        return $this->message ? $this->message : "Action completed successfully";
    }

    public function getCode(): int
    {
        return Response::HTTP_OK;
    }
}
