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

    public function __construct()
    {
        $this->sourceNormalizer = new SourceNormalizer();
        $this->nutrientNormalizer = new NutrientNormalizer();
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = []): ?Food
    {
        if (!isset($data['foods'], $data['foods'][0], $data['foods'][0]['food'])) {
            return null;
        }

        $dataFood = $data['foods'][0]['food'];

        if (!isset($dataFood['desc']['ndbno'], $dataFood['desc']['name'], $dataFood['desc']['ds'])) {
            return null;
        }

        $food = new Food($dataFood['desc']['ndbno'], $dataFood['desc']['name'], $dataFood['desc']['ds']);

        if (!empty($dataFood['desc']['sd'])) {
            $food->setShortDescription($dataFood['desc']['sd']);
        }

        if (!empty($dataFood['desc']['fg'])) {
            $food->setFoodGroup($dataFood['desc']['fg']);
        }

        if (!empty($dataFood['desc']['sn'])) {
            $food->setScientificName($dataFood['desc']['sn']);
        }
        if (!empty($dataFood['desc']['cn'])) {
            $food->setCommercialName($dataFood['desc']['cn']);
        }
        if (!empty($dataFood['desc']['manu'])) {
            $food->setManufacturerName($dataFood['desc']['manu']);
        }
        if (!empty($dataFood['desc']['nf'])) {
            $food->setNitrogenToProteinConversionFactor($dataFood['desc']['nf']);
        }
        if (!empty($dataFood['desc']['cf'])) {
            $food->setCarbohydrateFactor($dataFood['desc']['cf']);
        }
        if (!empty($dataFood['desc']['ff'])) {
            $food->setFatFactor($dataFood['desc']['ff']);
        }
        if (!empty($dataFood['desc']['pf'])) {
            $food->setProteinFactor($dataFood['desc']['pf']);
        }

        if (isset($dataFood['sources'])) {
            foreach ($dataFood['sources'] as $dataSource) {
                $food->addSource($this->sourceNormalizer->denormalize($dataSource, Source::class));
            }
        }

        if (isset($dataFood['nutrients'])) {
            $this->nutrientNormalizer->setFood($food);
            foreach ($dataFood['nutrients'] as $dataNutrient) {
                $this->updateNutrient($dataNutrient, $food);
            }
        }

        return $food;
    }

    /**
     * @param array $dataNutrient
     * @param Food $food
     * @return Food
     */
    private function updateNutrient(array $dataNutrient, Food $food): Food
    {
        $nutrient = $this->nutrientNormalizer->denormalize($dataNutrient, Nutrient::class);

        if (!$nutrient) {
            return $food;
        }

        switch ($dataNutrient['nutrient_id']) {
            case 513:
                $food->setAlanine($nutrient);
                break;
            case 221:
                $food->setAlcohol($nutrient);
                break;
            case 511:
                $food->setArginine($nutrient);
                break;
            case 207:
                $food->setAsh($nutrient);
                break;
            case 514:
                $food->setAsparticAcid($nutrient);
                break;
            case 641:
                $food->setBetaSitosterol($nutrient);
                break;
            case 454:
                $food->setBetaine($nutrient);
                break;
            case 262:
                $food->setCaffeine($nutrient);
                break;
            case 301:
                $food->setCalcium($nutrient);
                break;
            case 639:
                $food->setCampesterol($nutrient);
                break;
            case 205:
                $food->setCarbohydrate($nutrient);
                break;
            case 322:
                $food->setAlphaCarotene($nutrient);
                break;
            case 321:
                $food->setBetaCarotene($nutrient);
                break;
            case 601:
                $food->setCholesterol($nutrient);
                break;
            case 421:
                $food->setCholine($nutrient);
                break;
            case 312:
                $food->setCopper($nutrient);
                break;
            case 334:
                $food->setCryptoxanthin($nutrient);
                break;
            case 507:
                $food->setCystine($nutrient);
                break;
            case 208:
                $food->setEnergy($nutrient);
                break;
            case 645:
                $food->setMonounsaturatedFat($nutrient);
                break;
            case 646:
                $food->setPolyunsaturatedFat($nutrient);
                break;
            case 606:
                $food->setSaturatedFat($nutrient);
                break;
            case 605:
                $food->setTransFat($nutrient);
                break;
            case 291:
                $food->setFiber($nutrient);
                break;
            case 313:
                $food->setFluoride($nutrient);
                break;
            case 417:
                $food->setFolate($nutrient);
                break;
            case 431:
                $food->setFolicAcid($nutrient);
                break;
            case 212:
                $food->setFructose($nutrient);
                break;
            case 287:
                $food->setGalactose($nutrient);
                break;
            case 211:
                $food->setGlucose($nutrient);
                break;
            case 515:
                $food->setGlutamicAcid($nutrient);
                break;
            case 516:
                $food->setGlycine($nutrient);
                break;
            case 512:
                $food->setHistidine($nutrient);
                break;
            case 521:
                $food->setHydroxyproline($nutrient);
                break;
            case 303:
                $food->setIron($nutrient);
                break;
            case 503:
                $food->setIsoleucine($nutrient);
                break;
            case 213:
                $food->setLactose($nutrient);
                break;
            case 504:
                $food->setLeucine($nutrient);
                break;
            case 338:
                $food->setLuteinPlusZeaxanthin($nutrient);
                break;
            case 337:
                $food->setLycopene($nutrient);
                break;
            case 505:
                $food->setLysine($nutrient);
                break;
            case 304:
                $food->setMagnesium($nutrient);
                break;
            case 214:
                $food->setMaltose($nutrient);
                break;
            case 315:
                $food->setManganese($nutrient);
                break;
            case 506:
                $food->setMethionine($nutrient);
                break;
            case 406:
                $food->setNiacin($nutrient);
                break;
            case 410:
                $food->setPantothenicAcid($nutrient);
                break;
            case 508:
                $food->setPhenylalanine($nutrient);
                break;
            case 305:
                $food->setPhosphorus($nutrient);
                break;
            case 636:
                $food->setPhytosterols($nutrient);
                break;
            case 306:
                $food->setPotassium($nutrient);
                break;
            case 517:
                $food->setProline($nutrient);
                break;
            case 203:
                $food->setProtein($nutrient);
                break;
            case 319:
                $food->setRetinol($nutrient);
                break;
            case 405:
                $food->setRiboflavin($nutrient);
                break;
            case 317:
                $food->setSelenium($nutrient);
                break;
            case 518:
                $food->setSerine($nutrient);
                break;
            case 307:
                $food->setSodium($nutrient);
                break;
            case 209:
                $food->setStarch($nutrient);
                break;
            case 638:
                $food->setStigmasterol($nutrient);
                break;
            case 210:
                $food->setSucrose($nutrient);
                break;
            case 269:
                $food->setSugars($nutrient);
                break;
            case 263:
                $food->setTheobromine($nutrient);
                break;
            case 404:
                $food->setThiamin($nutrient);
                break;
            case 502:
                $food->setThreonine($nutrient);
                break;
            case 341:
                $food->setBetaTocopherol($nutrient);
                break;
            case 343:
                $food->setDeltaTocopherol($nutrient);
                break;
            case 342:
                $food->setGammaTocopherol($nutrient);
                break;
            case 344:
                $food->setAlphaTocotrienol($nutrient);
                break;
            case 345:
                $food->setBetaTocotrienol($nutrient);
                break;
            case 347:
                $food->setDeltaTocotrienol($nutrient);
                break;
            case 346:
                $food->setGammaTocotrienol($nutrient);
                break;
            case 204:
                $food->setFat($nutrient);
                break;
            case 501:
                $food->setTryptophan($nutrient);
                break;
            case 509:
                $food->setTyrosine($nutrient);
                break;
            case 510:
                $food->setValine($nutrient);
                break;
            case 320:
                $food->setVitaminA($nutrient);
                break;
            case 418:
                $food->setVitaminB12($nutrient);
                break;
            case 415:
                $food->setVitaminB6($nutrient);
                break;
            case 401:
                $food->setVitaminC($nutrient);
                break;
            case 328:
                $food->setVitaminD($nutrient);
                break;
            case 325:
                $food->setVitaminD2($nutrient);
                break;
            case 326:
                $food->setVitaminD3($nutrient);
                break;
            case 323:
                $food->setVitaminE($nutrient);
                break;
            case 430:
                $food->setVitaminK($nutrient);
                break;
            case 255:
                $food->setWater($nutrient);
                break;
            case 309:
                $food->setZinc($nutrient);
                break;
        }

        return $food;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Food::class;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
