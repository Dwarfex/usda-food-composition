<?php

namespace MOrtola\UsdaFoodComposition\Api;

use MOrtola\UsdaFoodComposition\Model\Food;
use MOrtola\UsdaFoodComposition\Serializer\FoodNormalizer;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class FoodApi extends AbstractApi
{
    public function get(string $id, string $apiKey): ?Food
    {
        $response = $this->httpGet(
            '/ndb/V2/reports',
            [
                'ndbno' => $id,
                'type' => 'f',
                'format' => 'json',
                'api_key' => $apiKey,
            ]
        );

        return $this->serialize($response, Food::class);
    }

    protected function serialize(ResponseInterface $response, string $class): ?Food
    {
        $serializer = new Serializer([new FoodNormalizer()], [new JsonEncoder()]);

        return $serializer->deserialize(
            $response->getBody()->getContents(),
            $class,
            'json'
        );
    }
}
