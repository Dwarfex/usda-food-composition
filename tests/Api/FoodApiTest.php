<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use MOrtola\UsdaFoodComposition\Api\FoodApi;
use MOrtola\UsdaFoodComposition\Model\Nutrient;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FoodApiTest extends TestCase
{
    /**
     * @var FoodApi
     */
    protected $foodApi;

    /**
     * @var MockHandler
     */
    protected $mockHandler;

    public function testGetNoFood()
    {
        $this->mockHandler->append(
            new Response(200, [], file_get_contents(__DIR__ . '/../fixtures/no_food_response.json'))
        );

        $food = $this->foodApi->get('invent', 'invent');

        Assert::assertNull($food);
    }

    public function testGetFoodWithoutNutrients()
    {
        $this->mockHandler->append(
            new Response(200, [], file_get_contents(__DIR__ . '/../fixtures/food_without_nutrients_response.json'))
        );

        $food = $this->foodApi->get('invent', 'invent');

        Assert::assertNotEmpty($food);
        Assert::assertNull($food->getEnergy());
    }

    public function testGetRawFood()
    {
        $this->mockHandler->append(
            new Response(200, [], file_get_contents(__DIR__ . '/../fixtures/raw_food_successful_response.json'))
        );

        $food = $this->foodApi->get('11124', 'invent');

        // Food
        Assert::assertEquals(
            '11124',
            $food->getDescription()->getId()
        );
        Assert::assertEquals(
            'Carrots, raw',
            $food->getDescription()->getName()
        );
        Assert::assertEquals(
            'CARROTS,RAW',
            $food->getDescription()->getShortDescription()
        );
        Assert::assertEquals(
            'Vegetables and Vegetable Products',
            $food->getDescription()->getFoodGroup()
        );
        Assert::assertEquals(
            'Daucus carota',
            $food->getDescription()->getScientificName()
        );
        Assert::assertEquals(
            6.25,
            $food->getDescription()->getNitrogenToProteinConversionFactor()
        );
        Assert::assertEquals(
            3.84,
            $food->getDescription()->getCarbohydrateFactor()
        );
        Assert::assertEquals(
            8.37,
            $food->getDescription()->getFatFactor()
        );
        Assert::assertEquals(
            2.78,
            $food->getDescription()->getProteinFactor()
        );

        Assert::assertNull($food->getDescription()->getCommercialName());
        Assert::assertNotEmpty($food->getSources());

        // Cholesterol
        $this->assertNutrient($food->getFluoride(), 313, 'Fluoride, F', 'Minerals', 'NONE', 3.2, 'µg');
    }

    private function assertNutrient(
        Nutrient $nutrient,
        int $id,
        string $name,
        string $group,
        string $derivation,
        float $quantityValue,
        string $quantityUnit
    ) {
        Assert::assertEquals(
            $id,
            $nutrient->getId()
        );
        Assert::assertEquals(
            $name,
            $nutrient->getName()
        );
        Assert::assertEquals(
            $group,
            $nutrient->getGroup()
        );
        Assert::assertEquals(
            $derivation,
            $nutrient->getDerivation()
        );
        Assert::assertEquals(
            $quantityValue,
            $nutrient->getQuantity()->toUnit($nutrient->getQuantity()->getUnit())
        );
        Assert::assertEquals(
            $quantityUnit,
            $nutrient->getQuantity()->getUnit()
        );
    }

    public function testGetLiquidFood()
    {
        $this->mockHandler->append(
            new Response(200, [], file_get_contents(__DIR__ . '/../fixtures/liquid_food_successful_response.json'))
        );

        $food = $this->foodApi->get('45218781', 'invent');

        // Food
        Assert::assertEquals(
            '45218781',
            $food->getDescription()->getId()
        );
        Assert::assertEquals(
            'SPARKLING WATER BEVERAGE, UPC: 036800403710',
            $food->getDescription()->getName()
        );
        Assert::assertNull($food->getDescription()->getFoodGroup());
        Assert::assertNull($food->getDescription()->getScientificName());
        Assert::assertNull($food->getDescription()->getShortDescription());
        Assert::assertNull($food->getDescription()->getCommercialName());
        Assert::assertNull($food->getDescription()->getNitrogenToProteinConversionFactor());
        Assert::assertNull($food->getDescription()->getCarbohydrateFactor());
        Assert::assertNull($food->getDescription()->getFatFactor());
        Assert::assertNull($food->getDescription()->getProteinFactor());
        Assert::assertEmpty($food->getSources());

        // Cholesterol
        $this->assertNutrient($food->getSugars(), 269, 'Sugars, total', 'Proximates', 'LCCS', 0, 'g');
    }

    public function testGetCommercialFood()
    {
        $this->mockHandler->append(
            new Response(200, [], file_get_contents(__DIR__ . '/../fixtures/commercial_food_successful_response.json'))
        );

        $food = $this->foodApi->get('45156252', 'invent');

        // Food
        Assert::assertEquals(
            '45156252',
            $food->getDescription()->getId()
        );
        Assert::assertEquals(
            'ABBA-ZABA, SNACK SIZE BITES CANDY, UPC: 070602609000',
            $food->getDescription()->getName()
        );
        Assert::assertEquals(
            'Label Insight',
            $food->getDescription()->getDatabaseSource()
        );
        Assert::assertEquals(
            'Annabelle Candy Co., Inc.',
            $food->getDescription()->getManufacturerName()
        );
        Assert::assertEquals(
            'family style, applebees',
            $food->getDescription()->getCommercialName()
        );
        Assert::assertNull($food->getDescription()->getFoodGroup());
        Assert::assertNull($food->getDescription()->getScientificName());
        Assert::assertNull($food->getDescription()->getShortDescription());
        Assert::assertNull($food->getDescription()->getNitrogenToProteinConversionFactor());
        Assert::assertNull($food->getDescription()->getCarbohydrateFactor());
        Assert::assertNull($food->getDescription()->getFatFactor());
        Assert::assertNull($food->getDescription()->getProteinFactor());
        Assert::assertEmpty($food->getSources());

        // Cholesterol
        $this->assertNutrient($food->getTransFat(), 605, 'Fatty acids, total trans', 'Lipids', 'LCCS', 0, 'g');
    }

    public function testGetStandardFood()
    {
        $this->mockHandler->append(
            new Response(200, [], file_get_contents(__DIR__ . '/../fixtures/standard_food_successful_response.json'))
        );

        $food = $this->foodApi->get('01009', 'invent');

        // Food
        Assert::assertEquals(
            '01009',
            $food->getDescription()->getId()
        );
        Assert::assertEquals(
            'Cheese, cheddar (Includes foods for USDA\'s Food Distribution Program)',
            $food->getDescription()->getName()
        );
        Assert::assertEquals(
            'CHEESE,CHEDDAR',
            $food->getDescription()->getShortDescription()
        );
        Assert::assertEquals(
            'Standard Reference',
            $food->getDescription()->getDatabaseSource()
        );
        Assert::assertEquals(
            'Dairy and Egg Products',
            $food->getDescription()->getFoodGroup()
        );
        Assert::assertNull($food->getDescription()->getManufacturerName());
        Assert::assertNull($food->getDescription()->getScientificName());
        Assert::assertNull($food->getDescription()->getCommercialName());
        Assert::assertNull($food->getDescription()->getNitrogenToProteinConversionFactor());
        Assert::assertNull($food->getDescription()->getCarbohydrateFactor());
        Assert::assertNull($food->getDescription()->getFatFactor());
        Assert::assertNull($food->getDescription()->getProteinFactor());

        // General sources
        Assert::assertNotEmpty($food->getSources());
        foreach ($food->getSources() as $source) {
            Assert::assertEquals(
                'MD',
                $source->getIssue()
            );
            Assert::assertEquals(
                'Beltsville',
                $source->getVolume()
            );
            Assert::assertTrue(
                is_numeric($source->getId())
            );
            Assert::assertTrue(
                is_numeric($source->getPublicationYear())
            );
            Assert::assertEquals(
                'Nutrient Data Laboratory, ARS, USDA',
                $source->getAuthors()
            );
            Assert::assertStringStartsWith(
                'National Food and Nutrient Analysis Program Wave',
                $source->getTitle()
            );
        }

        // Water
        $this->assertNutrient($food->getWater(), 255, 'Water', 'Proximates', 'NONE', 36.75, 'g');
        $this->assertMeasure($food->getWater(), 0, 'cup, diced', 1, 132, 48.51);
        $this->assertMeasure($food->getWater(), 5, 'slice (1 oz)', 1, 28, 10.29);
        Assert::assertEmpty($food->getWater()->getSources());

        // Energy
        $this->assertNutrient($food->getEnergy(), 208, 'Energy', 'Proximates', 'NC', 403.0, 'kcal');
        $this->assertMeasure($food->getEnergy(), 1, 'cup, melted', 1, 244, 983);
        $this->assertMeasure($food->getEnergy(), 3, 'oz', 1, 28.35, 114);
        Assert::assertEmpty($food->getEnergy()->getSources());

        // Protein
        $this->assertNutrient($food->getProtein(), 203, 'Protein', 'Proximates', 'NONE', 22.87, 'g');
        $this->assertSource(
            $food->getProtein(),
            1,
            'National Food and Nutrient Analysis Program Wave 17e',
            'Nutrient Data Laboratory, ARS, USDA',
            'Beltsville',
            'MD',
            2013,
            893,
            999
        );
        $this->assertSource(
            $food->getProtein(),
            2,
            'National Food and Nutrient Analysis Program Wave 19b',
            'Nutrient Data Laboratory, ARS, USDA',
            'Beltsville',
            'MD',
            2014
        );

        // Alcohol
        $this->assertNutrient($food->getAlcohol(), 221, 'Alcohol, ethyl', 'Other', 'NONE', 0, 'g');

        // Caffeine
        $this->assertNutrient($food->getCaffeine(), 262, 'Caffeine', 'Other', 'NONE', 0, 'mg');

        // AlphaCarotene
        $this->assertNutrient($food->getAlphaCarotene(), 322, 'Carotene, alpha', 'Vitamins', 'BFZN', 0, 'µg');

        // Cryptoxanthin
        $this->assertNutrient($food->getCryptoxanthin(), 334, 'Cryptoxanthin, beta', 'Vitamins', 'BFZN', 0, 'µg');

        // Fiber
        $this->assertNutrient($food->getFiber(), 291, 'Fiber, total dietary', 'Proximates', 'NONE', 0, 'g');

        // FolicAcid
        $this->assertNutrient($food->getFolicAcid(), 431, 'Folic acid', 'Vitamins', 'NONE', 0, 'µg');

        // Fructose
        $this->assertNutrient($food->getFructose(), 212, 'Fructose', 'Proximates', 'NONE', 0, 'g');

        // LuteinPlusZeaxanthin
        $this->assertNutrient($food->getLuteinPlusZeaxanthin(), 338, 'Lutein + zeaxanthin', 'Vitamins', 'BFZN', 0, 'µg');

        // Lycopene
        $this->assertNutrient($food->getLycopene(), 337, 'Lycopene', 'Vitamins', 'BFZN', 0, 'µg');

        // Maltose
        $this->assertNutrient($food->getMaltose(), 214, 'Maltose', 'Proximates', 'NONE', 0, 'g');

        // Sucrose
        $this->assertNutrient($food->getSucrose(), 210, 'Sucrose', 'Proximates', 'NONE', 0, 'g');

        // Theobromine
        $this->assertNutrient($food->getTheobromine(), 263, 'Theobromine', 'Other', 'NONE', 0, 'mg');

        // BetaTocopherol
        $this->assertNutrient($food->getBetaTocopherol(), 341, 'Tocopherol, beta', 'Vitamins', 'NONE', 0, 'mg');

        // DeltaTocopherol
        $this->assertNutrient($food->getDeltaTocopherol(), 343, 'Tocopherol, delta', 'Vitamins', 'NONE', 0, 'mg');

        // GammaTocopherol
        $this->assertNutrient($food->getGammaTocopherol(), 342, 'Tocopherol, gamma', 'Vitamins', 'NONE', 0, 'mg');

        // AlphaTocotrienol
        $this->assertNutrient($food->getAlphaTocotrienol(), 344, 'Tocotrienol, alpha', 'Vitamins', 'NONE', 0, 'mg');

        // BetaTocotrienol
        $this->assertNutrient($food->getBetaTocotrienol(), 345, 'Tocotrienol, beta', 'Vitamins', 'NONE', 0, 'mg');

        // DeltaTocotrienol
        $this->assertNutrient($food->getDeltaTocotrienol(), 347, 'Tocotrienol, delta', 'Vitamins', 'NONE', 0, 'mg');

        // GammaTocotrienol
        $this->assertNutrient($food->getGammaTocotrienol(), 346, 'Tocotrienol, gamma', 'Vitamins', 'NONE', 0, 'mg');

        // VitaminC
        $this->assertNutrient($food->getVitaminC(), 401, 'Vitamin C, total ascorbic acid', 'Vitamins', 'AS', 0, 'mg');

        // Manganese
        $this->assertNutrient($food->getManganese(), 315, 'Manganese, Mn', 'Minerals', 'NONE', 0.027, 'mg');

        // Thiamin
        $this->assertNutrient($food->getThiamin(), 404, 'Thiamin', 'Vitamins', 'NONE', 0.029, 'mg');

        // Copper
        $this->assertNutrient($food->getCopper(), 312, 'Copper, Cu', 'Minerals', 'NONE', 0.03, 'mg');

        // Niacin
        $this->assertNutrient($food->getNiacin(), 406, 'Niacin', 'Vitamins', 'NONE', 0.059, 'mg');

        // VitaminB6
        $this->assertNutrient($food->getVitaminB6(), 415, 'Vitamin B-6', 'Vitamins', 'NONE', 0.066, 'mg');

        // Galactose
        $this->assertNutrient($food->getGalactose(), 287, 'Galactose', 'Proximates', 'NONE', 0.1, 'g');

        // Lactose
        $this->assertNutrient($food->getLactose(), 213, 'Lactose', 'Proximates', 'NONE', 0.12, 'g');

        // Cystine
        $this->assertNutrient($food->getCystine(), 507, 'Cystine', 'Amino Acids', 'NONE', 0.123, 'g');

        // Iron
        $this->assertNutrient($food->getIron(), 303, 'Iron, Fe', 'Minerals', 'NONE', 0.14, 'mg');

        // Glucose
        $this->assertNutrient($food->getGlucose(), 211, 'Glucose (dextrose)', 'Proximates', 'NONE', 0.26, 'g');

        // PantothenicAcid
        $this->assertNutrient($food->getPantothenicAcid(), 410, 'Pantothenic acid', 'Vitamins', 'NONE', 0.41, 'mg');

        // Riboflavin
        $this->assertNutrient($food->getRiboflavin(), 405, 'Riboflavin', 'Vitamins', 'NONE', 0.428, 'mg');

        // Sugars
        $this->assertNutrient($food->getSugars(), 269, 'Sugars, total', 'Proximates', 'AS', 0.48, 'g');

        // Arginine
        $this->assertNutrient($food->getArginine(), 511, 'Arginine', 'Amino Acids', 'NONE', 0.547, 'g');

        // Glycine
        $this->assertNutrient($food->getGlycine(), 516, 'Glycine', 'Amino Acids', 'NONE', 0.547, 'g');

        // Histidine
        $this->assertNutrient($food->getHistidine(), 512, 'Histidine', 'Amino Acids', 'NONE', 0.547, 'g');

        // Methionine
        $this->assertNutrient($food->getMethionine(), 506, 'Methionine', 'Amino Acids', 'NONE', 0.547, 'g');

        // Tryptophan
        $this->assertNutrient($food->getTryptophan(), 501, 'Tryptophan', 'Amino Acids', 'NONE', 0.547, 'g');

        // VitaminD
        $this->assertNutrient($food->getVitaminD(), 328, 'Vitamin D (D2 + D3)', 'Vitamins', 'AS', 0.6, 'µg');

        // VitaminD3
        $this->assertNutrient($food->getVitaminD3(), 326, 'Vitamin D3 (cholecalciferol)', 'Vitamins', 'BFFN', 0.6, 'µg');

        // Betaine
        $this->assertNutrient($food->getBetaine(), 454, 'Betaine', 'Vitamins', 'NONE', 0.7, 'mg');

        // VitaminE
        $this->assertNutrient($food->getVitaminE(), 323, 'Vitamin E (alpha-tocopherol)', 'Vitamins', 'NONE', 0.71, 'mg');

        // Alanine
        $this->assertNutrient($food->getAlanine(), 513, 'Alanine', 'Amino Acids', 'NONE', 0.751, 'g');

        // Serine
        $this->assertNutrient($food->getSerine(), 518, 'Serine', 'Amino Acids', 'NONE', 0.78, 'g');

        // PolyunsaturatedFat
        $this->assertNutrient(
            $food->getPolyunsaturatedFat(),
            646,
            'Fatty acids, total polyunsaturated',
            'Lipids',
            'NONE',
            0.942,
            'g'
        );

        // Lysine
        $this->assertNutrient($food->getLysine(), 505, 'Lysine', 'Amino Acids', 'NONE', 1.025, 'g');

        // Threonine
        $this->assertNutrient($food->getThreonine(), 502, 'Threonine', 'Amino Acids', 'NONE', 1.044, 'g');

        // Phenylalanine
        $this->assertNutrient($food->getPhenylalanine(), 508, 'Phenylalanine', 'Amino Acids', 'NONE', 1.074, 'g');

        // VitaminB12
        $this->assertNutrient($food->getVitaminB12(), 418, 'Vitamin B-12', 'Vitamins', 'NONE', 1.1, 'µg');

        // Tyrosine
        $this->assertNutrient($food->getTyrosine(), 509, 'Tyrosine', 'Amino Acids', 'NONE', 1.108, 'g');

        // Isoleucine
        $this->assertNutrient($food->getIsoleucine(), 503, 'Isoleucine', 'Amino Acids', 'NONE', 1.206, 'g');

        // Valine
        $this->assertNutrient($food->getValine(), 510, 'Valine', 'Amino Acids', 'NONE', 1.404, 'g');

        // AsparticAcid
        $this->assertNutrient($food->getAsparticAcid(), 514, 'Aspartic acid', 'Amino Acids', 'NONE', 1.734, 'g');

        // Leucine
        $this->assertNutrient($food->getLeucine(), 504, 'Leucine', 'Amino Acids', 'NONE', 1.939, 'g');

        // Choline
        $this->assertNutrient($food->getCholine(), 421, 'Choline, total', 'Vitamins', 'AS', 16.5, 'mg');

        // SaturatedFat
        $this->assertNutrient($food->getSaturatedFat(), 606, 'Fatty acids, total saturated', 'Lipids', 'NC', 18.867, 'g');

        // VitaminK
        $this->assertNutrient($food->getVitaminK(), 430, 'Vitamin K (phylloquinone)', 'Vitamins', 'NONE', 2.4, 'µg');

        // Proline
        $this->assertNutrient($food->getProline(), 517, 'Proline', 'Amino Acids', 'NONE', 2.497, 'g');

        // Folate
        $this->assertNutrient($food->getFolate(), 417, 'Folate, total', 'Vitamins', 'NONE', 27, 'µg');

        // Magnesium
        $this->assertNutrient($food->getMagnesium(), 304, 'Magnesium, Mg', 'Minerals', 'NONE', 27, 'mg');

        // Selenium
        $this->assertNutrient($food->getSelenium(), 317, 'Selenium, Se', 'Minerals', 'NONE', 28.5, 'µg');

        // Carbohydrate
        $this->assertNutrient($food->getCarbohydrate(), 205, 'Carbohydrate, by difference', 'Proximates', 'NC', 3.37, 'g');

        // Zinc
        $this->assertNutrient($food->getZinc(), 309, 'Zinc, Zn', 'Minerals', 'NONE', 3.64, 'mg');

        // Ash
        $this->assertNutrient($food->getAsh(), 207, 'Ash', 'Proximates', 'NONE', 3.71, 'g');

        // Fat
        $this->assertNutrient($food->getFat(), 204, 'Total lipid (fat)', 'Proximates', 'NONE', 33.31, 'g');

        // Retinol
        $this->assertNutrient($food->getRetinol(), 319, 'Retinol', 'Vitamins', 'NONE', 330, 'µg');

        // VitaminA
        $this->assertNutrient($food->getVitaminA(), 320, 'Vitamin A, RAE', 'Vitamins', 'NC', 337, 'µg');

        // GlutamicAcid
        $this->assertNutrient($food->getGlutamicAcid(), 515, 'Glutamic acid', 'Amino Acids', 'NONE', 4.735, 'g');

        // Phosphorus
        $this->assertNutrient($food->getPhosphorus(), 305, 'Phosphorus, P', 'Minerals', 'NONE', 455, 'mg');

        // Sodium
        $this->assertNutrient($food->getSodium(), 307, 'Sodium, Na', 'Minerals', 'NONE', 653, 'mg');

        // Calcium
        $this->assertNutrient($food->getCalcium(), 301, 'Calcium, Ca', 'Minerals', 'NONE', 710, 'mg');

        // Potassium
        $this->assertNutrient($food->getPotassium(), 306, 'Potassium, K', 'Minerals', 'NONE', 76, 'mg');

        // BetaCarotene
        $this->assertNutrient($food->getBetaCarotene(), 321, 'Carotene, beta', 'Vitamins', 'BFZN', 85, 'µg');

        // MonounsaturatedFat
        $this->assertNutrient(
            $food->getMonounsaturatedFat(),
            645,
            'Fatty acids, total monounsaturated',
            'Lipids',
            'NONE',
            9.391,
            'g'
        );

        // Cholesterol
        $this->assertNutrient($food->getCholesterol(), 601, 'Cholesterol', 'Lipids', 'NONE', 99, 'mg');

        // BetaSitosterol
        $this->assertNutrient($food->getBetaSitosterol(), 641, 'Beta-sitosterol', 'Lipids', 'NONE', 275, 'mg');

        // Hydroxyproline
        $this->assertNutrient($food->getHydroxyproline(), 521, 'Hydroxyproline', 'Amino Acids', 'BFPN', 0.305, 'g');

        // Phytosterols
        $this->assertNutrient($food->getPhytosterols(), 636, 'Phytosterols', 'Lipids', 'AS', 410, 'mg');

        // Campesterol
        $this->assertNutrient($food->getCampesterol(), 639, 'Campesterol', 'Lipids', 'NONE', 11, 'mg');

        // Starch
        $this->assertNutrient($food->getStarch(), 209, 'Starch', 'Proximates', 'NONE', 35.47, 'g');

        // Stigmasterol
        $this->assertNutrient($food->getStigmasterol(), 638, 'Stigmasterol', 'Lipids', 'NONE', 35, 'mg');

        // VitaminD2
        $this->assertNutrient($food->getVitaminD2(), 325, 'Vitamin D2 (ergocalciferol)', 'Vitamins', 'NONE', 0, 'µg');

        // TransFat
        Assert::assertNull($food->getTransFat());

        // Fluoride
        Assert::assertNull($food->getFluoride());
    }

    private function assertMeasure(
        Nutrient $nutrient,
        int $index,
        string $label,
        float $portion,
        float $grams,
        float $nutrientQuantity
    ) {
        Assert::assertArrayHasKey(
            $index,
            $nutrient->getMeasures()
        );
        Assert::assertEquals(
            $label,
            $nutrient->getMeasures()[$index]->getLabel()
        );
        Assert::assertEquals(
            $portion,
            $nutrient->getMeasures()[$index]->getPortion()
        );
        Assert::assertEquals(
            $grams,
            $nutrient->getMeasures()[$index]->getWeight()->toUnit('g')
        );
        Assert::assertEquals(
            $nutrientQuantity,
            $nutrient->getMeasures()[$index]->getNutrientQuantity()->toUnit($nutrient->getMeasures()[$index]->getNutrientQuantity()->getUnit())
        );
        Assert::assertEquals(
            $nutrient->getQuantity()->getUnit(),
            $nutrient->getMeasures()[$index]->getNutrientQuantity()->getUnit()
        );
    }

    private function assertSource(
        Nutrient $nutrient,
        int $id,
        string $title,
        string $authors,
        string $volume = '',
        string $issue = '',
        int $publicationYear = null,
        int $startPage = null,
        int $endPage = null
    ) {
        Assert::assertArrayHasKey(
            $id,
            $nutrient->getSources()
        );
        Assert::assertEquals(
            $id,
            $nutrient->getSources()[$id]->getId()
        );
        Assert::assertEquals(
            $title,
            $nutrient->getSources()[$id]->getTitle()
        );
        Assert::assertEquals(
            $authors,
            $nutrient->getSources()[$id]->getAuthors()
        );
        Assert::assertEquals(
            $volume,
            $nutrient->getSources()[$id]->getVolume()
        );
        Assert::assertEquals(
            $issue,
            $nutrient->getSources()[$id]->getIssue()
        );
        Assert::assertEquals(
            $publicationYear,
            $nutrient->getSources()[$id]->getPublicationYear()
        );
        Assert::assertEquals(
            $startPage,
            $nutrient->getSources()[$id]->getStartPage()
        );
        Assert::assertEquals(
            $endPage,
            $nutrient->getSources()[$id]->getEndPage()
        );
    }

    protected function setUp()
    {
        $this->mockHandler = new MockHandler();
        $this->foodApi = new FoodApi(
            new Client(['base_uri' => 'https://api.nal.usda.gov', 'handler' => $this->mockHandler])
        );
    }
}
