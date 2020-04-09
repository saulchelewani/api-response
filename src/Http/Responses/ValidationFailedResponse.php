<?php


namespace TNM\ApiResponse\src\Http\Responses;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use TNM\ApiResponse\Http\HttpResponse;

class ValidationFailedResponse extends HttpResponse
{
    public function __construct(Validator $validator)
    {
        parent::__construct([], "data", $this->getMessage(), $this->getCode());
        $this->setErrors($validator->getMessageBag()->all());
    }

    public function getCode(): int
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }

    public function getMessage(): string
    {
        return "The given data is invalid.";
    }
}
