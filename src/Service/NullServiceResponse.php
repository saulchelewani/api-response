<?php


namespace TNM\ApiResponse\Service;


class NullServiceResponse extends AbstractServiceResponse
{
    public function __construct(string $message = "Action failed. Please try again later", int $code = 400)
    {
        parent::__construct([], "data", $message, $code);
    }
}
