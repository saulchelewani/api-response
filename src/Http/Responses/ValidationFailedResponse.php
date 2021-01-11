<?php


namespace TNM\ApiResponse\Http\Responses;



use Illuminate\Validation\Validator;

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
