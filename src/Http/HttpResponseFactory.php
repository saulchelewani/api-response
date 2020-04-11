<?php

namespace TNM\ApiResponse\Http;

use Illuminate\Http\JsonResponse;
use TNM\ApiResponse\Exceptions\InvalidResponseCodeException;
use TNM\ApiResponse\Service\ServiceResponseInterface;
use TNM\ApiResponse\src\Http\Responses\ObjectCreatedResponse;
use TNM\ApiResponse\src\Http\Responses\ObjectNotFoundResponse;
use TNM\ApiResponse\src\Http\Responses\PreconditionFailedResponse;
use TNM\ApiResponse\src\Http\Responses\UnauthorizedResponse;

class HttpResponseFactory
{
    /**
     * @param ServiceResponseInterface $response
     * @return JsonResponse
     * @throws InvalidResponseCodeException
     */
    public static function fromServiceResponse(ServiceResponseInterface $response): JsonResponse
    {
        switch ($response->getCode()) {
            case 200:
                $httpResponse = new OkayResponse();
                break;
            case 201:
                $httpResponse = new ObjectCreatedResponse();
                break;
            case 404:
                $httpResponse = new ObjectNotFoundResponse();
                break;
            case 412:
                $httpResponse = new PreconditionFailedResponse();
                break;
            case 401:
                $httpResponse = new UnauthorizedResponse();
                break;
            case 422:
                $httpResponse = new UnprocessableEntityResponse();
                break;
            default:
                throw new InvalidResponseCodeException(sprintf("The given response code %s is invalid", $response->getCode()));
        }

        return $httpResponse
            ->setMessage($response->getMessage())
            ->setData($response->getData())
            ->setErrors($response->getErrors())
            ->send();
    }
}
