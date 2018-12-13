<?php

namespace MOrtola\UsdaFoodComposition\Tests\Serializer;

use MOrtola\UsdaFoodComposition\Model\Food;
use MOrtola\UsdaFoodComposition\Serializer\FoodNormalizer;
use MOrtola\UsdaFoodComposition\Serializer\SourceNormalizer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FoodNormalizerTest extends TestCase
{
    /**
     * @var SourceNormalizer
     */
    private $normalizer;

    public function setUp()
    {
        $this->normalizer = new FoodNormalizer();
    }

    public function testDenormalizeWithoutRequiredAttributes()
    {
        $sourceAsArray = [
            'foods' => [
                0 => [
                    'food' => [
                        'desc' => [
                            'ndbno' => 123
                        ]
                    ]
                ]
            ]
        ];

        Assert::assertNull($this->normalizer->denormalize($sourceAsArray, Food::class));

        $sourceAsArray = [
            'foods' => [0 => ['food' => []]]
        ];

        Assert::assertNull($this->normalizer->denormalize($sourceAsArray, Food::class));
    }

    public function testHasCacheableSupportsMethod()
    {
        Assert::assertTrue($this->normalizer->hasCacheableSupportsMethod());
    }

    public function testSupportsDenormalization()
    {
        $this->assertTrue($this->normalizer->supportsDenormalization('invent', Food::class));
        $this->assertFalse($this->normalizer->supportsDenormalization('invent', 'Invent'));
    }
}
