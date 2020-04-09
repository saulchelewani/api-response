<?php

namespace TNM\ApiResponse\Http;

use Illuminate\Http\JsonResponse;
use TNM\ApiResponse\Exceptions\InvalidResponseCodeException;
use TNM\ApiResponse\Service\ServiceResponseInterface;

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
            default:
                throw new InvalidResponseCodeException("The given response code is invalid");
        }

        return $httpResponse->setMessage($response->getMessage())->send();
    }
}
