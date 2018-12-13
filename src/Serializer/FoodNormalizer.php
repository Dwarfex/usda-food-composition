<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\Food;
use MOrtola\UsdaFoodComposition\Model\FoodDescription;
use MOrtola\UsdaFoodComposition\Model\Nutrient;
use MOrtola\UsdaFoodComposition\Model\Source;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class FoodNormalizer implements DenormalizerInterface, CacheableSupportsMethodInterface
{
    public function denormalize($data, $class, $format = null, array $context = []): ?Food
    {
        if (!$this->getFoodData($data)) {
            return null;
        }

        $foodDescriptionNormalizer = new FoodDescriptionNormalizer();
        $foodDescription = $foodDescriptionNormalizer->denormalize($this->getFoodData($data)['desc'], FoodDescription::class);

        if (!$foodDescription) {
            return null;
        }

        $food = new Food($foodDescription);
        $food = $this->withDenormalizedFoodSources($this->getFoodData($data), $food);
        return $this->withDenormalizedFoodNutrients($this->getFoodData($data), $food);
    }

    private function withDenormalizedFoodNutrients(array $foodData, Food $food): Food
    {
        if (empty($foodData['nutrients'])) {
            return $food;
        }

        $nutrientNormalizer = new NutrientNormalizer($food);

        foreach ($foodData['nutrients'] as $dataNutrient) {
            if ($nutrient = $nutrientNormalizer->denormalize($dataNutrient, Nutrient::class)) {
                $food->addNutrient($nutrient);
            }
        }

        return $food;
    }

    private function withDenormalizedFoodSources(array $foodData, Food $food): Food
    {
        if (empty($foodData['sources'])) {
            return $food;
        }

        $sourceNormalizer = new SourceNormalizer();

        foreach ($foodData['sources'] as $dataSource) {
            if ($source = $sourceNormalizer->denormalize($dataSource, Source::class)) {
                $food->addSource($source);
            }
        }

        return $food;
    }

    private function getFoodData(array $data): ?array
    {
        if (!isset($data['foods'][0]['food'])) {
            return null;
        }

        return $data['foods'][0]['food'];
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Food::class;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
