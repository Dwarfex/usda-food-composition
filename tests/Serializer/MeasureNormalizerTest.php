<?php

namespace MOrtola\UsdaFoodComposition\Tests\Serializer;

use MOrtola\UsdaFoodComposition\Model\Measure;
use MOrtola\UsdaFoodComposition\Model\Nutrient;
use MOrtola\UsdaFoodComposition\Model\Quantity;
use MOrtola\UsdaFoodComposition\Serializer\MeasureNormalizer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use Symfony\Component\Serializer\Exception\BadMethodCallException;

class MeasureNormalizerTest extends TestCase
{
    /**
     * @var MeasureNormalizer
     */
    private $normalizer;

    public function setUp()
    {
        $this->normalizer = new MeasureNormalizer();
    }

    public function testDenormalizeWithoutSettingNutrientFood()
    {
        $this->expectException(BadMethodCallException::class);
        $this->normalizer->denormalize([], Measure::class);
    }

    public function testDenormalizeWithoutRequiredAttributes()
    {
        $measureAsArray = [
            'label' => 'Fake label',
        ];

        $this->normalizer->setNutrient(
            new Nutrient('123', 'Fake name', '', '', new Quantity(new Mass(1, 'g')))
        );

        Assert::assertNull($this->normalizer->denormalize($measureAsArray, Measure::class));
    }

    public function testHasCacheableSupportsMethod()
    {
        Assert::assertTrue($this->normalizer->hasCacheableSupportsMethod());
    }

    public function testSupportsDenormalization()
    {
        $this->assertTrue($this->normalizer->supportsDenormalization('invent', Measure::class));
        $this->assertFalse($this->normalizer->supportsDenormalization('invent', 'Invent'));
    }
}
