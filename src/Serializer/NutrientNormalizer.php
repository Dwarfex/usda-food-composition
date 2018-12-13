<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\Food;
use MOrtola\UsdaFoodComposition\Model\Measure;
use MOrtola\UsdaFoodComposition\Model\Nutrient;
use MOrtola\UsdaFoodComposition\Model\PhysicalQuantity\NutritionalEnergy;
use MOrtola\UsdaFoodComposition\Model\Quantity;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class NutrientNormalizer implements DenormalizerInterface, CacheableSupportsMethodInterface
{
    /**
     * @var Food
     */
    private $food;

    public function __construct(Food $food)
    {
        $this->food = $food;
    }

    public function denormalize($data, $class, $format = null, array $context = []): ?Nutrient
    {
        if (!isset($data['nutrient_id'], $data['derivation'], $data['unit'], $data['value'], $data['group'])) {
            return null;
        }

        if (!$quantity = $this->getNutrientPhysicalQuantity($data)) {
            return null;
        }

        $nutrient = new Nutrient(
            $data['nutrient_id'],
            $data['name'],
            $data['derivation'],
            $data['group'],
            new Quantity($quantity)
        );

        $nutrient = $this->withDenormalizedNutrientMeasures($data, $nutrient);
        return $this->withDenormalizedNutrientSources($data, $nutrient);
    }

    private function getNutrientPhysicalQuantity(array $data): ?PhysicalQuantityInterface
    {
        try {
            if (Nutrient::isEnergy(intval($data['nutrient_id']))) {
                return new NutritionalEnergy($data['value'], $data['unit']);
            }
            return new Mass($data['value'], Mass::getUnit($data['unit'])->getName());
        } catch (\Exception $e) {
            return null;
        }
    }

    private function withDenormalizedNutrientMeasures(array $data, Nutrient $nutrient): Nutrient
    {
        if (empty($data['measures'])) {
            return $nutrient;
        }

        $measureNormalizer = new MeasureNormalizer($nutrient);

        foreach ($data['measures'] as $dataMeasure) {
            if ($measure = $measureNormalizer->denormalize($dataMeasure, Measure::class)) {
                $nutrient->addMeasure($measure);
            }
        }

        return $nutrient;
    }

    private function withDenormalizedNutrientSources(array $data, Nutrient $nutrient): Nutrient
    {
        if (empty($data['sourcecode'])) {
            return $nutrient;
        }

        foreach ($data['sourcecode'] as $dataSourceId) {
            if (isset($this->food->getSources()[$dataSourceId])) {
                $nutrient->addSource($this->food->getSources()[$dataSourceId]);
            }
        }

        return $nutrient;
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Nutrient::class;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
