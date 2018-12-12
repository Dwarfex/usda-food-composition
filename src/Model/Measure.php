<?php

namespace MOrtola\UsdaFoodComposition\Model;

use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

class Measure
{
    /**
     * @var string
     */
    public $label;

    /**
     * @var Mass
     */
    private $weight;

    /**
     * @var Quantity
     */
    private $nutrientQuantity;

    /**
     * @var float
     */
    private $portion;

    public function __construct(string $label, float $portion, float $quantityValue, Mass $weight, Nutrient $nutrient)
    {
        $this->label = $label;
        $this->weight = $weight;
        $this->portion = $portion;

        $nutrientPhysicalQuantityClass = $nutrient->getQuantity()->getPhysicalQuantityClass();

        $this->nutrientQuantity = new Quantity(
            new $nutrientPhysicalQuantityClass(
                $quantityValue,
                $nutrient->getQuantity()->getUnit()
            )
        );
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getWeight(): Mass
    {
        return $this->weight;
    }

    public function getNutrientQuantity(): Quantity
    {
        return $this->nutrientQuantity;
    }

    public function getPortion(): float
    {
        return $this->portion;
    }
}
