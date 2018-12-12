<?php

namespace MOrtola\UsdaFoodComposition\Tests\Serializer;

use MOrtola\UsdaFoodComposition\Model\Nutrient;
use MOrtola\UsdaFoodComposition\Serializer\NutrientNormalizer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\BadMethodCallException;

class NutrientNormalizerTest extends TestCase
{
    /**
     * @var NutrientNormalizer
     */
    private $normalizer;

    public function setUp()
    {
        $this->normalizer = new NutrientNormalizer();
    }

    public function testDenormalizeWithoutSettingNutrientFood()
    {
        $this->expectException(BadMethodCallException::class);
        $this->normalizer->denormalize([], Nutrient::class);
    }

    public function testHasCacheableSupportsMethod()
    {
        Assert::assertTrue($this->normalizer->hasCacheableSupportsMethod());
    }

    public function testSupportsDenormalization()
    {
        $this->assertTrue($this->normalizer->supportsDenormalization('invent', Nutrient::class));
        $this->assertFalse($this->normalizer->supportsDenormalization('invent', 'Invent'));
    }
}
