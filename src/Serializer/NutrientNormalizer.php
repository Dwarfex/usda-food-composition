<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\Food;
use MOrtola\UsdaFoodComposition\Model\Measure;
use MOrtola\UsdaFoodComposition\Model\Nutrient;
use MOrtola\UsdaFoodComposition\Model\PhysicalQuantity\NutritionalEnergy;
use MOrtola\UsdaFoodComposition\Model\Quantity;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
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

    public function __construct()
    {
        $this->measureNormalizer = new MeasureNormalizer();
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = []): ?Nutrient
    {
        if (null === $this->food) {
            throw new BadMethodCallException('Please set the food before calling this denormalizer.');
        }

        if (!isset($data['nutrient_id'], $data['derivation'], $data['unit'], $data['value'], $data['group'])) {
            return null;
        }

        try {
            if (in_array(intval($data['nutrient_id']), [208, 268], true)) {
                $quantity = new NutritionalEnergy($data['value'], $data['unit']);
            } else {
                $quantity = new Mass($data['value'], Mass::getUnit($data['unit'])->getName());
            }
        } catch (\Exception $e) {
            return null;
        }

        $nutrient = new Nutrient(
            $data['nutrient_id'],
            $data['name'],
            $data['derivation'],
            $data['group'],
            new Quantity($quantity)
        );

        if (isset($data['measures'])) {
            $this->measureNormalizer->setNutrient($nutrient);
            foreach ($data['measures'] as $dataMeasure) {
                if ($measure = $this->measureNormalizer->denormalize($dataMeasure, Measure::class)) {
                    $nutrient->addMeasure($measure);
                }
            }
        }

        if (!empty($data['sourcecode'])) {
            foreach ($data['sourcecode'] as $dataSourceId) {
                if (isset($this->food->getSources()[$dataSourceId])) {
                    $nutrient->addSource($this->food->getSources()[$dataSourceId]);
                }
            }
        }

        return $nutrient;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Nutrient::class;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function setFood(Food $food): void
    {
        $this->food = $food;
    }
}
