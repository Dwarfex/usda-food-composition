<?php

namespace MOrtola\UsdaFoodComposition\Model;

class Food
{
    /**
     * @var FoodDescription
     */
    private $description;

    /**
     * @var Source[]
     */
    private $sources;

    /**
     * @var Nutrient[]
     */
    private $nutrients;

    public function __construct(FoodDescription $description)
    {
        $this->description = $description;
        $this->sources = [];
        $this->nutrients = [];
    }

    public function getDescription(): FoodDescription
    {
        return $this->description;
    }

    /**
     * @return Source[]
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    public function addSource(Source $source): void
    {
        $this->sources[$source->getId()] = $source;
    }

    public function addNutrient(Nutrient $nutrient): void
    {
        $this->nutrients[$nutrient->getId()] = $nutrient;
    }

    public function getAlanine(): ?Nutrient
    {
        return $this->getNutritient(513);
    }

    private function getNutritient(int $id): ?Nutrient
    {
        return $this->nutrients[$id] ?? null;
    }

    public function getAlcohol(): ?Nutrient
    {
        return $this->getNutritient(221);
    }

    public function getArginine(): ?Nutrient
    {
        return $this->getNutritient(511);
    }

    public function getAsh(): ?Nutrient
    {
        return $this->getNutritient(207);
    }

    public function getAsparticAcid(): ?Nutrient
    {
        return $this->getNutritient(514);
    }

    public function getBetaSitosterol(): ?Nutrient
    {
        return $this->getNutritient(641);
    }

    public function getBetaine(): ?Nutrient
    {
        return $this->getNutritient(454);
    }

    public function getCaffeine(): ?Nutrient
    {
        return $this->getNutritient(262);
    }

    public function getCalcium(): ?Nutrient
    {
        return $this->getNutritient(301);
    }

    public function getCampesterol(): ?Nutrient
    {
        return $this->getNutritient(639);
    }

    public function getCarbohydrate(): ?Nutrient
    {
        return $this->getNutritient(205);
    }

    public function getAlphaCarotene(): ?Nutrient
    {
        return $this->getNutritient(322);
    }

    public function getBetaCarotene(): ?Nutrient
    {
        return $this->getNutritient(321);
    }

    public function getCholesterol(): ?Nutrient
    {
        return $this->getNutritient(601);
    }

    public function getCholine(): ?Nutrient
    {
        return $this->getNutritient(421);
    }

    public function getCopper(): ?Nutrient
    {
        return $this->getNutritient(312);
    }

    public function getCryptoxanthin(): ?Nutrient
    {
        return $this->getNutritient(334);
    }

    public function getCystine(): ?Nutrient
    {
        return $this->getNutritient(507);
    }

    public function getEnergy(): ?Nutrient
    {
        return $this->getNutritient(208);
    }

    public function getMonounsaturatedFat(): ?Nutrient
    {
        return $this->getNutritient(645);
    }

    public function getPolyunsaturatedFat(): ?Nutrient
    {
        return $this->getNutritient(646);
    }

    public function getSaturatedFat(): ?Nutrient
    {
        return $this->getNutritient(606);
    }

    public function getTransFat(): ?Nutrient
    {
        return $this->getNutritient(605);
    }

    public function getFiber(): ?Nutrient
    {
        return $this->getNutritient(291);
    }

    public function getFluoride(): ?Nutrient
    {
        return $this->getNutritient(313);
    }

    public function getFolate(): ?Nutrient
    {
        return $this->getNutritient(417);
    }

    public function getFolicAcid(): ?Nutrient
    {
        return $this->getNutritient(431);
    }

    public function getFructose(): ?Nutrient
    {
        return $this->getNutritient(212);
    }

    public function getGalactose(): ?Nutrient
    {
        return $this->getNutritient(287);
    }

    public function getGlucose(): ?Nutrient
    {
        return $this->getNutritient(211);
    }

    public function getGlutamicAcid(): ?Nutrient
    {
        return $this->getNutritient(515);
    }

    public function getGlycine(): ?Nutrient
    {
        return $this->getNutritient(516);
    }

    public function getHistidine(): ?Nutrient
    {
        return $this->getNutritient(512);
    }

    public function getHydroxyproline(): ?Nutrient
    {
        return $this->getNutritient(521);
    }

    public function getIron(): ?Nutrient
    {
        return $this->getNutritient(303);
    }

    public function getIsoleucine(): ?Nutrient
    {
        return $this->getNutritient(503);
    }

    public function getLactose(): ?Nutrient
    {
        return $this->getNutritient(213);
    }

    public function getLeucine(): ?Nutrient
    {
        return $this->getNutritient(504);
    }

    public function getLuteinPlusZeaxanthin(): ?Nutrient
    {
        return $this->getNutritient(338);
    }

    public function getLycopene(): ?Nutrient
    {
        return $this->getNutritient(337);
    }

    public function getLysine(): ?Nutrient
    {
        return $this->getNutritient(505);
    }

    public function getMagnesium(): ?Nutrient
    {
        return $this->getNutritient(304);
    }

    public function getMaltose(): ?Nutrient
    {
        return $this->getNutritient(214);
    }

    public function getManganese(): ?Nutrient
    {
        return $this->getNutritient(315);
    }

    public function getMethionine(): ?Nutrient
    {
        return $this->getNutritient(506);
    }

    public function getNiacin(): ?Nutrient
    {
        return $this->getNutritient(406);
    }

    public function getPantothenicAcid(): ?Nutrient
    {
        return $this->getNutritient(410);
    }

    public function getPhenylalanine(): ?Nutrient
    {
        return $this->getNutritient(508);
    }

    public function getPhosphorus(): ?Nutrient
    {
        return $this->getNutritient(305);
    }

    public function getPhytosterols(): ?Nutrient
    {
        return $this->getNutritient(636);
    }

    public function getPotassium(): ?Nutrient
    {
        return $this->getNutritient(306);
    }

    public function getProline(): ?Nutrient
    {
        return $this->getNutritient(517);
    }

    public function getProtein(): ?Nutrient
    {
        return $this->getNutritient(203);
    }

    public function getRetinol(): ?Nutrient
    {
        return $this->getNutritient(319);
    }

    public function getRiboflavin(): ?Nutrient
    {
        return $this->getNutritient(405);
    }

    public function getSelenium(): ?Nutrient
    {
        return $this->getNutritient(317);
    }

    public function getSerine(): ?Nutrient
    {
        return $this->getNutritient(518);
    }

    public function getSodium(): ?Nutrient
    {
        return $this->getNutritient(307);
    }

    public function getStarch(): ?Nutrient
    {
        return $this->getNutritient(209);
    }

    public function getStigmasterol(): ?Nutrient
    {
        return $this->getNutritient(638);
    }

    public function getSucrose(): ?Nutrient
    {
        return $this->getNutritient(210);
    }

    public function getSugars(): ?Nutrient
    {
        return $this->getNutritient(269);
    }

    public function getTheobromine(): ?Nutrient
    {
        return $this->getNutritient(263);
    }

    public function getThiamin(): ?Nutrient
    {
        return $this->getNutritient(404);
    }

    public function getThreonine(): ?Nutrient
    {
        return $this->getNutritient(502);
    }

    public function getBetaTocopherol(): ?Nutrient
    {
        return $this->getNutritient(341);
    }

    public function getDeltaTocopherol(): ?Nutrient
    {
        return $this->getNutritient(343);
    }

    public function getGammaTocopherol(): ?Nutrient
    {
        return $this->getNutritient(342);
    }

    public function getAlphaTocotrienol(): ?Nutrient
    {
        return $this->getNutritient(344);
    }

    public function getBetaTocotrienol(): ?Nutrient
    {
        return $this->getNutritient(345);
    }

    public function getDeltaTocotrienol(): ?Nutrient
    {
        return $this->getNutritient(347);
    }

    public function getGammaTocotrienol(): ?Nutrient
    {
        return $this->getNutritient(346);
    }

    public function getFat(): ?Nutrient
    {
        return $this->getNutritient(204);
    }

    public function getTryptophan(): ?Nutrient
    {
        return $this->getNutritient(501);
    }

    public function getTyrosine(): ?Nutrient
    {
        return $this->getNutritient(509);
    }

    public function getValine(): ?Nutrient
    {
        return $this->getNutritient(510);
    }

    public function getVitaminA(): ?Nutrient
    {
        return $this->getNutritient(320);
    }

    public function getVitaminB12(): ?Nutrient
    {
        return $this->getNutritient(418);
    }

    public function getVitaminB6(): ?Nutrient
    {
        return $this->getNutritient(415);
    }

    public function getVitaminC(): ?Nutrient
    {
        return $this->getNutritient(401);
    }

    public function getVitaminD(): ?Nutrient
    {
        return $this->getNutritient(328);
    }

    public function getVitaminD2(): ?Nutrient
    {
        return $this->getNutritient(325);
    }

    public function getVitaminD3(): ?Nutrient
    {
        return $this->getNutritient(326);
    }

    public function getVitaminE(): ?Nutrient
    {
        return $this->getNutritient(323);
    }

    public function getVitaminK(): ?Nutrient
    {
        return $this->getNutritient(430);
    }

    public function getWater(): ?Nutrient
    {
        return $this->getNutritient(255);
    }

    public function getZinc(): ?Nutrient
    {
        return $this->getNutritient(309);
    }
}
