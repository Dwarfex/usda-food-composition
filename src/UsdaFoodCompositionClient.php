<?php

namespace MOrtola\UsdaFoodComposition;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use MOrtola\UsdaFoodComposition\Api\FoodApi;

class UsdaFoodCompositionClient
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param array $clientOptions
     */
    public function __construct(array $clientOptions = [])
    {
        $this->client = new Client(
            array_merge($clientOptions, ['base_uri' => 'https://api.nal.usda.gov'])
        );
    }

    /**
     * @return FoodApi
     */
    public function food(): FoodApi
    {
        return new FoodApi($this->client);
    }
}
