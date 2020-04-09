<?php

namespace TNM\ApiResponse\Tests;

use Illuminate\Http\JsonResponse;
use Tests\TestCase;
use TNM\ApiResponse\Http\HttpResponseFactory;
use TNM\ApiResponse\Service\ServiceResponse;

class ResponseTest extends TestCase
{
    public function test_get_api_response()
    {
        $serviceResponse = (new ServiceResponse(["name" => "John Doe"]));

        $httpResponse = HttpResponseFactory::fromServiceResponse($serviceResponse)->getData(true);

        $this->assertArrayHasKey("status", $httpResponse);
        $this->assertArrayHasKey("data", $httpResponse);
        $this->assertEquals("Action completed successfully", $httpResponse['status']['message']);
        $this->assertEquals(JsonResponse::HTTP_OK, $httpResponse['status']['code']);
        $this->assertTrue($httpResponse['status']['success']);
        $this->assertEmpty($httpResponse['status']['errors']);
    }
}
