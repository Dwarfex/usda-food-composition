<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\Food;
use MOrtola\UsdaFoodComposition\Model\Measure;
use MOrtola\UsdaFoodComposition\Model\Nutrient;
use MOrtola\UsdaFoodComposition\Model\PhysicalQuantity\NutritionalEnergy;
use MOrtola\UsdaFoodComposition\Model\Quantity;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;
use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class NutrientNormalizer implements DenormalizerInterface, CacheableSupportsMethodInterface
{
    /**
     * @var MeasureNormalizer
     */
    private $measureNormalizer;

    /**
     * @var Food
     */
    private $food;

    /**
     * @var Nutrient
     */
    private $nutrient;

    public function __construct()
    {
        $this->measureNormalizer = new MeasureNormalizer();
    }

    public function denormalize($data, $class, $format = null, array $context = []): ?Nutrient
    {
        if (null === $this->food) {
            throw new BadMethodCallException('Please set the food before calling this denormalizer.');
        }

        if (!isset($data['nutrient_id'], $data['derivation'], $data['unit'], $data['value'], $data['group'])) {
            return null;
        }

        if (!$quantity = $this->getNutrientPhysicalQuantity($data)) {
            return null;
        }

        $this->nutrient = new Nutrient(
            $data['nutrient_id'],
            $data['name'],
            $data['derivation'],
            $data['group'],
            new Quantity($quantity)
        );

        $this->setNutrientMeasures($data);
        $this->setNutrientSources($data);

        return $this->nutrient;
    }

    private function getNutrientPhysicalQuantity(array $data): ?PhysicalQuantityInterface
    {
        try {
            if ($this->isEnergyNutrient(intval($data['nutrient_id']))) {
                return new NutritionalEnergy($data['value'], $data['unit']);
            }
            return new Mass($data['value'], Mass::getUnit($data['unit'])->getName());
        } catch (\Exception $e) {
            return null;
        }
    }

    private function isEnergyNutrient(int $id): bool
    {
        return in_array($id, [208, 268], true);
    }

    private function setNutrientMeasures(array $data): void
    {
        if (!empty($data['measures'])) {
            $this->measureNormalizer->setNutrient($this->nutrient);
            foreach ($data['measures'] as $dataMeasure) {
                if ($measure = $this->measureNormalizer->denormalize($dataMeasure, Measure::class)) {
                    $this->nutrient->addMeasure($measure);
                }
            }
        }
    }

    private function setNutrientSources(array $data): void
    {
        if (!empty($data['sourcecode'])) {
            foreach ($data['sourcecode'] as $dataSourceId) {
                if (isset($this->food->getSources()[$dataSourceId])) {
                    $this->nutrient->addSource($this->food->getSources()[$dataSourceId]);
                }
            }
        }
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Nutrient::class;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }

    public function setFood(Food $food): void
    {
        $this->food = $food;
    }
}
