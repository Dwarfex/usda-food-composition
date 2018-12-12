<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use MOrtola\UsdaFoodComposition\Api\FoodApi;
use MOrtola\UsdaFoodComposition\UsdaFoodCompositionClient;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class UsdaFoodCompositionClientTest extends TestCase
{
    /**
     * @var UsdaFoodCompositionClient
     */
    protected $usdaFoodCompositionClient;

    /**
     * @var FoodApi
     */
    protected $foodApi;

    /**
     * @var MockHandler
     */
    protected $mockHandler;

    public function setUp()
    {
        $this->mockHandler = new MockHandler();
        $this->usdaFoodCompositionClient = new UsdaFoodCompositionClient(['handler' => $this->mockHandler]);
    }

    public function testFood()
    {
        $foodApi = new FoodApi(
            new Client(['base_uri' => 'https://api.nal.usda.gov', 'handler' => $this->mockHandler])
        );
        $responseContentFiles = [
            'commercial_food_successful_response.json',
            'liquid_food_successful_response.json',
            'no_food_response.json',
            'raw_food_successful_response.json',
            'standard_food_successful_response.json'
        ];
        foreach ($responseContentFiles as $responseContentFile) {
            $this->mockHandler->append(
                new Response(200, [], file_get_contents(__DIR__ . '/fixtures/' . $responseContentFile)),
                new Response(200, [], file_get_contents(__DIR__ . '/fixtures/' . $responseContentFile))
            );

            Assert::assertEquals(
                $this->usdaFoodCompositionClient->food()->get('invent', 'invent'),
                $foodApi->get('invent', 'invent')
            );
        }
    }
}
