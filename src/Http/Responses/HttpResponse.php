<?php


namespace TNM\ApiResponse\Http;


use Illuminate\Http\JsonResponse;
use TNM\ApiResponse\Service\AbstractServiceResponse;

abstract class HttpResponse extends AbstractServiceResponse
{
    public function __construct($data = [], string $key = "data", string $message = "", int $code = 200)
    {
        parent::__construct($data, $key, $message, $code);
    }

    public function send(): JsonResponse
    {
        return $this->toHttpResponse();
    }
}
