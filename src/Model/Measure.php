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

    /**
     * @param string $label
     * @param float $portion
     * @param float $quantityValue
     * @param Mass $weight
     * @param Nutrient $nutrient
     */
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

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return Mass
     */
    public function getWeight(): Mass
    {
        return $this->weight;
    }

    /**
     * @return Quantity
     */
    public function getNutrientQuantity(): Quantity
    {
        return $this->nutrientQuantity;
    }

    /**
     * @return float
     */
    public function getPortion(): float
    {
        return $this->portion;
    }
}
