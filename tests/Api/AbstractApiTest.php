<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use MOrtola\UsdaFoodComposition\Api\FoodApi;
use MOrtola\UsdaFoodComposition\Exception\ApiLimitExceededException;
use MOrtola\UsdaFoodComposition\Exception\BadRequestException;
use MOrtola\UsdaFoodComposition\Exception\InvalidApiKeyException;
use MOrtola\UsdaFoodComposition\Exception\UnknownException;
use PHPUnit\Framework\TestCase;

class AbstractApiTest extends TestCase
{
    /**
     * @var MockHandler
     */
    private $mockHandler;

    /**
     * @var FoodApi
     */
    private $api;

    public function setUp()
    {
        $this->mockHandler = new MockHandler();

        $this->api = new FoodApi(
            new Client(['base_uri' => 'https://api.nal.usda.gov', 'handler' => $this->mockHandler])
        );
    }

    public function testHttpGetWhenBadDomain()
    {
        $liveApi = new FoodApi(
            new Client(['base_uri' => 'https://apinvent.nal.usda.gov'])
        );
        $this->expectException(ConnectException::class);
        $liveApi->get('invent', 'invent');
    }

    public function testHttpGetUnknownException()
    {
        $this->mockHandler->append(
            new BadResponseException(
                'JSON API_KEY_INVALID',
                new Request('GET', 'invent'),
                new Response(411)
            )
        );
        $this->expectException(UnknownException::class);
        $this->api->get('11124', 'invent');
    }

    public function testHttpGetWhenInvalidApiKey()
    {
        $this->mockHandler->append(
            new BadResponseException(
                'JSON API_KEY_INVALID',
                new Request('GET', 'invent'),
                new Response(403)
            )
        );
        $this->expectException(InvalidApiKeyException::class);
        $this->api->get('11124', 'invent');
    }

    public function testHttpGetWhenBadRequest()
    {
        $this->mockHandler->append(
            new BadResponseException(
                '404 not found',
                new Request('GET', 'invent'),
                new Response(404)
            ),
            new BadResponseException(
                '400 bad request',
                new Request('GET', 'invent'),
                new Response(400)
            )
        );
        $this->expectException(BadRequestException::class);
        $this->api->get('11124', 'invent');
        $this->expectException(BadResponseException::class);
        $this->api->get('11124', 'invent');
    }

    public function testHttpGetWhenApiLimitExceeded()
    {
        $this->mockHandler->append(
            new BadResponseException(
                'Too Many Requests',
                new Request('GET', 'invent'),
                new Response(429)
            )
        );
        $this->expectException(ApiLimitExceededException::class);
        $this->api->get('11124', 'invent');
    }
}
