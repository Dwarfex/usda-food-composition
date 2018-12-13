<?php

namespace MOrtola\UsdaFoodComposition\Tests\Serializer;

use MOrtola\UsdaFoodComposition\Model\FoodDescription;
use MOrtola\UsdaFoodComposition\Serializer\FoodDescriptionNormalizer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FoodDescriptionNormalizerTest extends TestCase
{
    /**
     * @var FoodDescriptionNormalizer
     */
    private $normalizer;

    public function setUp()
    {
        $this->normalizer = new FoodDescriptionNormalizer();
    }

    public function testDenormalize()
    {
        $sourceAsArray = [
            'ndbno' => '00312',
            'name' => 'Fake name',
            'ds' => 'Fake ds',

            'sd' => 'Fake sd',
            'fg' => 'Fake fg',
            'sn' => 'Fake sn',
            'cn' => 'Fake cn',
            'manu' => 'Fake manu',

            'nf' => 1,
            'cf' => 1,
            'ff' => 1,
            'pf' => 1,
        ];

        $resultFoodDescription = new FoodDescription('00312', 'Fake name', 'Fake ds');
        $resultFoodDescription->setShortDescription('Fake sd');
        $resultFoodDescription->setFoodGroup('Fake fg');
        $resultFoodDescription->setScientificName('Fake sn');
        $resultFoodDescription->setCommercialName('Fake cn');
        $resultFoodDescription->setManufacturerName('Fake manu');
        $resultFoodDescription->setNitrogenToProteinConversionFactor(1);
        $resultFoodDescription->setCarbohydrateFactor(1);
        $resultFoodDescription->setProteinFactor(1);
        $resultFoodDescription->setFatFactor(1);

        Assert::assertEquals(
            $resultFoodDescription,
            $this->normalizer->denormalize($sourceAsArray, FoodDescription::class)
        );
    }

    public function testDenormalizeWithoutRequiredAttributes()
    {
        $sourceAsArray = [
            'ndbno' => 'FakeID',
        ];

        Assert::assertNull($this->normalizer->denormalize($sourceAsArray, FoodDescription::class));
    }

    public function testHasCacheableSupportsMethod()
    {
        Assert::assertTrue($this->normalizer->hasCacheableSupportsMethod());
    }

    public function testSupportsDenormalization()
    {
        $this->assertTrue($this->normalizer->supportsDenormalization('invent', FoodDescription::class));
        $this->assertFalse($this->normalizer->supportsDenormalization('invent', 'Invent'));
    }
}
