<?php

namespace MOrtola\UsdaFoodComposition\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use MOrtola\UsdaFoodComposition\Exception\ApiExceptionInterface;
use MOrtola\UsdaFoodComposition\Exception\ApiLimitExceededException;
use MOrtola\UsdaFoodComposition\Exception\BadRequestException;
use MOrtola\UsdaFoodComposition\Exception\InvalidApiKeyException;
use MOrtola\UsdaFoodComposition\Exception\UnknownException;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws GuzzleException
     */
    protected function httpGet(string $path, array $parameters = []): ResponseInterface
    {
        return $this->httpRequest('GET', $path, ['query' => $parameters]);
    }

    /**
     * @throws ApiExceptionInterface
     * @throws GuzzleException
     */
    protected function httpRequest(string $method, string $path, array $parameters = []): ResponseInterface
    {
        try {
            $response = $this->client->request($method, $path, $parameters);
        } catch (BadResponseException $e) {
            $this->handleRequestException($e->getResponse()->getStatusCode());
        }

        if (!isset($response)) {
            throw new UnknownException();
        }

        return $response;
    }

    /**
     * @throws ApiExceptionInterface
     */
    protected function handleRequestException(int $responseStatusCode)
    {
        if (403 === $responseStatusCode) {
            throw new InvalidApiKeyException();
        }
        if (429 === $responseStatusCode) {
            throw new ApiLimitExceededException();
        }
        if (400 === $responseStatusCode || 404 === $responseStatusCode) {
            throw new BadRequestException();
        }
    }

    abstract protected function serialize(ResponseInterface $response, string $class);
}
