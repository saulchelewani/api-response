<?php

namespace TNM\ApiResponse\Service;

use Illuminate\Http\JsonResponse;

interface ServiceResponseInterface
{
    public function getKey(): string;

    public function getMessage(): string;

    public function successful(): bool;

    public function getCode(): int;

    public function getErrors(): array;

    public function getData(): array;

    public function getHeaders(): array;

    public function toHttpResponse(): JsonResponse;
}
