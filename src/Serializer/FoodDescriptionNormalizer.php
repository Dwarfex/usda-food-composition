<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\FoodDescription;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class FoodDescriptionNormalizer implements DenormalizerInterface, CacheableSupportsMethodInterface
{
    public function denormalize($data, $class, $format = null, array $context = []): ?FoodDescription
    {
        if (!isset($data['ndbno'], $data['name'], $data['ds'])) {
            return null;
        }

        $foodDescription = new FoodDescription($data['ndbno'], $data['name'], $data['ds']);

        if (!empty($data['sd'])) {
            $foodDescription->setShortDescription($data['sd']);
        }
        if (!empty($data['fg'])) {
            $foodDescription->setFoodGroup($data['fg']);
        }

        $foodDescription = $this->withDenormalizedAlternativeNames($data, $foodDescription);

        return $this->withDenormalizedNutrientFactors($data, $foodDescription);
    }

    private function withDenormalizedAlternativeNames(array $data, FoodDescription $foodDescription): FoodDescription
    {
        if (!empty($data['sn'])) {
            $foodDescription->setScientificName($data['sn']);
        }
        if (!empty($data['cn'])) {
            $foodDescription->setCommercialName($data['cn']);
        }
        if (!empty($data['manu'])) {
            $foodDescription->setManufacturerName($data['manu']);
        }

        return $foodDescription;
    }

    private function withDenormalizedNutrientFactors(array $data, FoodDescription $foodDescription): FoodDescription
    {
        if (!empty($data['nf'])) {
            $foodDescription->setNitrogenToProteinConversionFactor($data['nf']);
        }
        if (!empty($data['cf'])) {
            $foodDescription->setCarbohydrateFactor($data['cf']);
        }
        if (!empty($data['ff'])) {
            $foodDescription->setFatFactor($data['ff']);
        }
        if (!empty($data['pf'])) {
            $foodDescription->setProteinFactor($data['pf']);
        }

        return $foodDescription;
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === FoodDescription::class;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
