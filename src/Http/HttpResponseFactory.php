<?php

namespace TNM\ApiResponse\Http;

use Illuminate\Http\JsonResponse;
use TNM\ApiResponse\Exceptions\InvalidResponseCodeException;
use TNM\ApiResponse\Http\Responses\OkayResponse;
use TNM\ApiResponse\Http\Responses\UnprocessableEntityResponse;
use TNM\ApiResponse\Service\ServiceResponseInterface;
use TNM\ApiResponse\Http\Responses\BadResponse;
use TNM\ApiResponse\Http\Responses\ObjectCreatedResponse;
use TNM\ApiResponse\Http\Responses\ObjectNotFoundResponse;
use TNM\ApiResponse\Http\Responses\PreconditionFailedResponse;
use TNM\ApiResponse\Http\Responses\UnauthorizedResponse;

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
            case 400:
                $httpResponse = new BadResponse();
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
