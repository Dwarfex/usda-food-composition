<?php

namespace MOrtola\UsdaFoodComposition\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use MOrtola\UsdaFoodComposition\Exceptions\ApiExceptionInterface;
use MOrtola\UsdaFoodComposition\Exceptions\ApiLimitExceededException;
use MOrtola\UsdaFoodComposition\Exceptions\BadRequestException;
use MOrtola\UsdaFoodComposition\Exceptions\InvalidApiKeyException;
use MOrtola\UsdaFoodComposition\Exceptions\UnknownException;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return ResponseInterface
     * @throws ApiExceptionInterface
     */
    protected function httpGet(string $path, array $parameters = []): ResponseInterface
    {
        return $this->httpRequest('GET', $path, ['query' => $parameters]);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $parameters
     * @return ResponseInterface
     * @throws ApiExceptionInterface
     */
    protected function httpRequest(string $method, string $path, array $parameters = []): ResponseInterface
    {
        try {
            return $this->client->request($method, $path, $parameters);
        } catch (BadResponseException $e) {
            if (403 === $e->getResponse()->getStatusCode()) {
                throw new InvalidApiKeyException();
            }
            if (429 === $e->getResponse()->getStatusCode()) {
                throw new ApiLimitExceededException();
            }
            if (400 === $e->getResponse()->getStatusCode() || 404 === $e->getResponse()->getStatusCode()) {
                throw new BadRequestException();
            }
        } catch (GuzzleException $e) {
        }

        throw new UnknownException();
    }

    /**
     * @param ResponseInterface $response
     * @param string $class
     * @return object
     */
    abstract protected function serialize(ResponseInterface $response, string $class);
}
