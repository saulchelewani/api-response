<?php


namespace TNM\ApiResponse\Service;


class ServiceResponse extends AbstractServiceResponse
{
    public function __construct(array $data = [], string $key = "data", string $message = "Action completed successfully", int $code = 200)
    {
        parent::__construct($data, $key, $message, $code);
    }
}
