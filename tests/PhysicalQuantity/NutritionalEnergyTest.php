<?php


use MOrtola\UsdaFoodComposition\Model\PhysicalQuantity\NutritionalEnergy;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class NutritionalEnergyTest extends TestCase
{
    public function testKcalUnit()
    {
        $nutritionalEnergyInJ = new NutritionalEnergy(1, 'J');
        Assert::assertEquals(1, $nutritionalEnergyInJ->toUnit('J'));
        Assert::assertEquals(0.0002390057361376673, $nutritionalEnergyInJ->toUnit('kcal'));
        Assert::assertEquals(0.001, $nutritionalEnergyInJ->toUnit('kJ'));

        $nutritionalEnergyInKcal = new NutritionalEnergy(1, 'kcal');
        Assert::assertEquals(1, $nutritionalEnergyInKcal->toUnit('kcal'));
        Assert::assertEquals(4184, $nutritionalEnergyInKcal->toUnit('J'));
    }
}
