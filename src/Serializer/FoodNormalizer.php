<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\Food;
use MOrtola\UsdaFoodComposition\Model\Nutrient;
use MOrtola\UsdaFoodComposition\Model\Source;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class FoodNormalizer implements DenormalizerInterface, CacheableSupportsMethodInterface
{
    /**
     * @var SourceNormalizer
     */
    private $sourceNormalizer;

    /**
     * @var NutrientNormalizer
     */
    private $nutrientNormalizer;

    /**
     * @var Food
     */
    private $food;

    public function __construct()
    {
        $this->sourceNormalizer = new SourceNormalizer();
        $this->nutrientNormalizer = new NutrientNormalizer();
    }

    public function denormalize($data, $class, $format = null, array $context = []): ?Food
    {
        if (!$this->getFoodData($data)) {
            return null;
        }

        if (!isset($this->getFoodData($data)['desc']['ndbno'], $this->getFoodData($data)['desc']['name'], $this->getFoodData($data)['desc']['ds'])) {
            return null;
        }

        $this->food = new Food(
            $this->getFoodData($data)['desc']['ndbno'],
            $this->getFoodData($data)['desc']['name'],
            $this->getFoodData($data)['desc']['ds']
        );

        $this->setOptionalProperties($data);
        $this->setFoodSources($data);
        $this->setFoodNutrients($data);

        return $this->food;
    }

    private function setFoodNutrients(array $data): void
    {
        if (isset($this->getFoodData($data)['nutrients'])) {
            $this->nutrientNormalizer->setFood($this->food);
            foreach ($this->getFoodData($data)['nutrients'] as $dataNutrient) {
                if ($nutrient = $this->nutrientNormalizer->denormalize($dataNutrient, Nutrient::class)) {
                    $this->food->addNutrient($nutrient);
                }
            }
        }
    }

    private function setFoodSources(array $data): void
    {
        if (isset($this->getFoodData($data)['sources'])) {
            foreach ($this->getFoodData($data)['sources'] as $dataSource) {
                if ($source = $this->sourceNormalizer->denormalize($dataSource, Source::class)) {
                    $this->food->addSource($source);
                }
            }
        }
    }

    private function setOptionalProperties(array $data): void
    {
        if (!empty($this->getFoodData($data)['desc']['sd'])) {
            $this->food->setShortDescription($this->getFoodData($data)['desc']['sd']);
        }

        if (!empty($this->getFoodData($data)['desc']['fg'])) {
            $this->food->setFoodGroup($this->getFoodData($data)['desc']['fg']);
        }

        if (!empty($this->getFoodData($data)['desc']['sn'])) {
            $this->food->setScientificName($this->getFoodData($data)['desc']['sn']);
        }
        if (!empty($this->getFoodData($data)['desc']['cn'])) {
            $this->food->setCommercialName($this->getFoodData($data)['desc']['cn']);
        }
        if (!empty($this->getFoodData($data)['desc']['manu'])) {
            $this->food->setManufacturerName($this->getFoodData($data)['desc']['manu']);
        }
        if (!empty($this->getFoodData($data)['desc']['nf'])) {
            $this->food->setNitrogenToProteinConversionFactor($this->getFoodData($data)['desc']['nf']);
        }
        if (!empty($this->getFoodData($data)['desc']['cf'])) {
            $this->food->setCarbohydrateFactor($this->getFoodData($data)['desc']['cf']);
        }
        if (!empty($this->getFoodData($data)['desc']['ff'])) {
            $this->food->setFatFactor($this->getFoodData($data)['desc']['ff']);
        }
        if (!empty($this->getFoodData($data)['desc']['pf'])) {
            $this->food->setProteinFactor($this->getFoodData($data)['desc']['pf']);
        }
    }

    private function getFoodData(array $data): ?array
    {
        if (!isset($data['foods'], $data['foods'][0], $data['foods'][0]['food'])) {
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
