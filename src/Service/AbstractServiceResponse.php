<?php


namespace TNM\ApiResponse\Service;


use Illuminate\Http\JsonResponse;

abstract class AbstractServiceResponse implements ServiceResponseInterface
{
    private $data = [];
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var int
     */
    private $code;
    /**
     * @var array
     */
    private $headers = [];
    private $errors = [];

    public function __construct(?array $data = [], string $key = "data", string $message = "", int $code = 200)
    {
        $this->data = $data;
        $this->key = $key;
        $this->message = $message;
        $this->code = $code;
    }

    public function toHttpResponse(): JsonResponse
    {
        return response()->json([
            "status" => [
                "success" => $this->successful(),
                "code" => $this->getCode(),
                "errors" => $this->getErrors(),
                "message" => $this->getMessage()
            ],
            $this->getKey() => $this->getData()
        ], $this->getCode(), $this->getHeaders(), JSON_PRETTY_PRINT);
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    public function setErrors(array $errors): self
    {
        $this->errors = $errors;
        return $this;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function successful(): bool
    {
        return $this->getCode() >= 200 && $this->getCode() < 400;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
