<?php

namespace MOrtola\UsdaFoodComposition\Model\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Energy;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;
use PhpUnitsOfMeasure\UnitOfMeasure;

class NutritionalEnergy extends Energy implements PhysicalQuantityInterface
{
    /**
     * @throws \PhpUnitsOfMeasure\Exception\DuplicateUnitNameOrAlias
     * @throws \PhpUnitsOfMeasure\Exception\NonStringUnitName
     */
    protected static function initialize()
    {
        parent::initialize();

        $kcal = new UnitOfMeasure(
            'kcal',
            function ($valueInNativeUnit) {
                return $valueInNativeUnit / 4184;
            },
            function ($valueInThisUnit) {
                return $valueInThisUnit * 4184;
            }
        );
        $kcal->addAlias('kcal');
        if (!static::unitNameOrAliasesAlreadyRegistered($kcal)) {
            static::addUnit($kcal);
        }
    }
}
