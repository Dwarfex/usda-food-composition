<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\Measure;
use MOrtola\UsdaFoodComposition\Model\Nutrient;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class MeasureNormalizer implements DenormalizerInterface, CacheableSupportsMethodInterface
{
    /**
     * @var Nutrient
     */
    private $nutrient;

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = []): ?Measure
    {
        if (null === $this->nutrient) {
            throw new BadMethodCallException('Please set the nutrient before calling this denormalizer.');
        }

        if (!isset($data['label'], $data['eqv'], $data['eunit'], $data['qty'], $data['value'])) {
            return null;
        }

        try {
            return new Measure(
                $data['label'],
                $data['qty'],
                $data['value'],
                new Mass($data['eqv'], Mass::getUnit($data['eunit'])->getName()),
                $this->nutrient
            );
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Measure::class;
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
    public function setNutrient(Nutrient $nutrient): void
    {
        $this->nutrient = $nutrient;
    }
}
