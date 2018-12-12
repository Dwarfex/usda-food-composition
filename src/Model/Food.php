<?php

namespace MOrtola\UsdaFoodComposition\Model;

class Food
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var string
     */
    private $databaseSource;

    /**
     * @var string
     */
    private $foodGroup;

    /**
     * @var string
     */
    private $scientificName;

    /**
     * @var string
     */
    private $commercialName;

    /**
     * @var string
     */
    private $manufacturerName;

    /**
     * @var float
     */
    private $nitrogenToProteinConversionFactor;

    /**
     * @var float
     */
    private $carbohydrateFactor;

    /**
     * @var float
     */
    private $fatFactor;

    /**
     * @var float
     */
    private $proteinFactor;

    /**
     * @var Source[]
     */
    private $sources;

    /**
     * @var Nutrient
     */
    private $water;

    /**
     * @var Nutrient
     */
    private $energy;

    /**
     * @var Nutrient
     */
    private $protein;

    /**
     * @var Nutrient
     */
    private $alanine;

    /**
     * @var Nutrient
     */
    private $alcohol;

    /**
     * @var Nutrient
     */
    private $arginine;

    /**
     * @var Nutrient
     */
    private $ash;

    /**
     * @var Nutrient
     */
    private $asparticAcid;

    /**
     * @var Nutrient
     */
    private $betaSitosterol;

    /**
     * @var Nutrient
     */
    private $betaine;

    /**
     * @var Nutrient
     */
    private $caffeine;

    /**
     * @var Nutrient
     */
    private $calcium;

    /**
     * @var Nutrient
     */
    private $campesterol;

    /**
     * @var Nutrient
     */
    private $carbohydrate;

    /**
     * @var Nutrient
     */
    private $alphaCarotene;

    /**
     * @var Nutrient
     */
    private $betaCarotene;

    /**
     * @var Nutrient
     */
    private $cholesterol;

    /**
     * @var Nutrient
     */
    private $choline;

    /**
     * @var Nutrient
     */
    private $copper;

    /**
     * @var Nutrient
     */
    private $cryptoxanthin;

    /**
     * @var Nutrient
     */
    private $cystine;

    /**
     * @var Nutrient
     */
    private $monounsaturatedFat;

    /**
     * @var Nutrient
     */
    private $polyunsaturatedFat;

    /**
     * @var Nutrient
     */
    private $saturatedFat;

    /**
     * @var Nutrient
     */
    private $transFat;

    /**
     * @var Nutrient
     */
    private $fiber;

    /**
     * @var Nutrient
     */
    private $fluoride;

    /**
     * @var Nutrient
     */
    private $folate;

    /**
     * @var Nutrient
     */
    private $folicAcid;

    /**
     * @var Nutrient
     */
    private $fructose;

    /**
     * @var Nutrient
     */
    private $galactose;

    /**
     * @var Nutrient
     */
    private $glucose;

    /**
     * @var Nutrient
     */
    private $glutamicAcid;

    /**
     * @var Nutrient
     */
    private $glycine;

    /**
     * @var Nutrient
     */
    private $histidine;

    /**
     * @var Nutrient
     */
    private $hydroxyproline;

    /**
     * @var Nutrient
     */
    private $iron;

    /**
     * @var Nutrient
     */
    private $isoleucine;

    /**
     * @var Nutrient
     */
    private $lactose;

    /**
     * @var Nutrient
     */
    private $leucine;

    /**
     * @var Nutrient
     */
    private $luteinPlusZeaxanthin;

    /**
     * @var Nutrient
     */
    private $lycopene;

    /**
     * @var Nutrient
     */
    private $lysine;

    /**
     * @var Nutrient
     */
    private $magnesium;

    /**
     * @var Nutrient
     */
    private $maltose;

    /**
     * @var Nutrient
     */
    private $manganese;

    /**
     * @var Nutrient
     */
    private $methionine;

    /**
     * @var Nutrient
     */
    private $niacin;

    /**
     * @var Nutrient
     */
    private $pantothenicAcid;

    /**
     * @var Nutrient
     */
    private $phenylalanine;

    /**
     * @var Nutrient
     */
    private $phosphorus;

    /**
     * @var Nutrient
     */
    private $phytosterols;

    /**
     * @var Nutrient
     */
    private $potassium;

    /**
     * @var Nutrient
     */
    private $proline;

    /**
     * @var Nutrient
     */
    private $retinol;

    /**
     * @var Nutrient
     */
    private $riboflavin;

    /**
     * @var Nutrient
     */
    private $selenium;

    /**
     * @var Nutrient
     */
    private $serine;

    /**
     * @var Nutrient
     */
    private $sodium;

    /**
     * @var Nutrient
     */
    private $starch;

    /**
     * @var Nutrient
     */
    private $stigmasterol;

    /**
     * @var Nutrient
     */
    private $sucrose;

    /**
     * @var Nutrient
     */
    private $sugars;

    /**
     * @var Nutrient
     */
    private $theobromine;

    /**
     * @var Nutrient
     */
    private $thiamin;

    /**
     * @var Nutrient
     */
    private $threonine;

    /**
     * @var Nutrient
     */
    private $betaTocopherol;

    /**
     * @var Nutrient
     */
    private $deltaTocopherol;

    /**
     * @var Nutrient
     */
    private $gammaTocopherol;

    /**
     * @var Nutrient
     */
    private $alphaTocotrienol;

    /**
     * @var Nutrient
     */
    private $betaTocotrienol;

    /**
     * @var Nutrient
     */
    private $deltaTocotrienol;

    /**
     * @var Nutrient
     */
    private $gammaTocotrienol;

    /**
     * @var Nutrient
     */
    private $fat;

    /**
     * @var Nutrient
     */
    private $tryptophan;

    /**
     * @var Nutrient
     */
    private $tyrosine;

    /**
     * @var Nutrient
     */
    private $valine;

    /**
     * @var Nutrient
     */
    private $vitaminA;

    /**
     * @var Nutrient
     */
    private $vitaminB12;

    /**
     * @var Nutrient
     */
    private $vitaminB6;

    /**
     * @var Nutrient
     */
    private $vitaminC;

    /**
     * @var Nutrient
     */
    private $vitaminD;

    /**
     * @var Nutrient
     */
    private $vitaminD2;

    /**
     * @var Nutrient
     */
    private $vitaminD3;

    /**
     * @var Nutrient
     */
    private $vitaminE;

    /**
     * @var Nutrient
     */
    private $vitaminK;

    /**
     * @var Nutrient
     */
    private $zinc;

    /**
     * @param string $id
     * @param string $name
     * @param string $databaseSource
     */
    public function __construct(string $id, string $name, string $databaseSource)
    {
        $this->id = $id;
        $this->name = $name;
        $this->databaseSource = $databaseSource;
        $this->sources = [];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return string
     */
    public function getDatabaseSource(): string
    {
        return $this->databaseSource;
    }

    /**
     * @return string
     */
    public function getFoodGroup(): ?string
    {
        return $this->foodGroup;
    }

    /**
     * @param string $foodGroup
     */
    public function setFoodGroup(string $foodGroup): void
    {
        $this->foodGroup = $foodGroup;
    }

    /**
     * @return string
     */
    public function getScientificName(): ?string
    {
        return $this->scientificName;
    }

    /**
     * @param string $scientificName
     */
    public function setScientificName(string $scientificName): void
    {
        $this->scientificName = $scientificName;
    }

    /**
     * @return string
     */
    public function getCommercialName(): ?string
    {
        return $this->commercialName;
    }

    /**
     * @param string $commercialName
     */
    public function setCommercialName(string $commercialName): void
    {
        $this->commercialName = $commercialName;
    }

    /**
     * @return string
     */
    public function getManufacturerName(): ?string
    {
        return $this->manufacturerName;
    }

    /**
     * @param string $manufacturerName
     */
    public function setManufacturerName(string $manufacturerName): void
    {
        $this->manufacturerName = $manufacturerName;
    }

    /**
     * @return float
     */
    public function getNitrogenToProteinConversionFactor(): ?float
    {
        return $this->nitrogenToProteinConversionFactor;
    }

    /**
     * @param float $nitrogenToProteinConversionFactor
     */
    public function setNitrogenToProteinConversionFactor(float $nitrogenToProteinConversionFactor): void
    {
        $this->nitrogenToProteinConversionFactor = $nitrogenToProteinConversionFactor;
    }

    /**
     * @return float
     */
    public function getCarbohydrateFactor(): ?float
    {
        return $this->carbohydrateFactor;
    }

    /**
     * @param float $carbohydrateFactor
     */
    public function setCarbohydrateFactor(float $carbohydrateFactor): void
    {
        $this->carbohydrateFactor = $carbohydrateFactor;
    }

    /**
     * @return float
     */
    public function getFatFactor(): ?float
    {
        return $this->fatFactor;
    }

    /**
     * @param float $fatFactor
     */
    public function setFatFactor(float $fatFactor): void
    {
        $this->fatFactor = $fatFactor;
    }

    /**
     * @return float
     */
    public function getProteinFactor(): ?float
    {
        return $this->proteinFactor;
    }

    /**
     * @param float $proteinFactor
     */
    public function setProteinFactor(float $proteinFactor): void
    {
        $this->proteinFactor = $proteinFactor;
    }

    /**
     * @return Source[]
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @param Source $source
     */
    public function addSource(Source $source): void
    {
        $this->sources[$source->getId()] = $source;
    }

    /**
     * @return Nutrient
     */
    public function getWater(): ?Nutrient
    {
        return $this->water;
    }

    /**
     * @param Nutrient $water
     */
    public function setWater(Nutrient $water): void
    {
        $this->water = $water;
    }

    /**
     * @return Nutrient
     */
    public function getEnergy(): ?Nutrient
    {
        return $this->energy;
    }

    /**
     * @param Nutrient $energy
     */
    public function setEnergy(Nutrient $energy): void
    {
        $this->energy = $energy;
    }

    /**
     * @return Nutrient
     */
    public function getProtein(): ?Nutrient
    {
        return $this->protein;
    }

    /**
     * @param Nutrient $protein
     */
    public function setProtein(Nutrient $protein): void
    {
        $this->protein = $protein;
    }

    /**
     * @return Nutrient
     */
    public function getAlanine(): ?Nutrient
    {
        return $this->alanine;
    }

    /**
     * @param Nutrient $alanine
     */
    public function setAlanine(Nutrient $alanine): void
    {
        $this->alanine = $alanine;
    }

    /**
     * @return Nutrient
     */
    public function getAlcohol(): ?Nutrient
    {
        return $this->alcohol;
    }

    /**
     * @param Nutrient $alcohol
     */
    public function setAlcohol(Nutrient $alcohol): void
    {
        $this->alcohol = $alcohol;
    }

    /**
     * @return Nutrient
     */
    public function getArginine(): ?Nutrient
    {
        return $this->arginine;
    }

    /**
     * @param Nutrient $arginine
     */
    public function setArginine(Nutrient $arginine): void
    {
        $this->arginine = $arginine;
    }

    /**
     * @return Nutrient
     */
    public function getAsh(): ?Nutrient
    {
        return $this->ash;
    }

    /**
     * @param Nutrient $ash
     */
    public function setAsh(Nutrient $ash): void
    {
        $this->ash = $ash;
    }

    /**
     * @return Nutrient
     */
    public function getAsparticAcid(): ?Nutrient
    {
        return $this->asparticAcid;
    }

    /**
     * @param Nutrient $asparticAcid
     */
    public function setAsparticAcid(Nutrient $asparticAcid): void
    {
        $this->asparticAcid = $asparticAcid;
    }

    /**
     * @return Nutrient
     */
    public function getBetaSitosterol(): ?Nutrient
    {
        return $this->betaSitosterol;
    }

    /**
     * @param Nutrient $betaSitosterol
     */
    public function setBetaSitosterol(Nutrient $betaSitosterol): void
    {
        $this->betaSitosterol = $betaSitosterol;
    }

    /**
     * @return Nutrient
     */
    public function getBetaine(): ?Nutrient
    {
        return $this->betaine;
    }

    /**
     * @param Nutrient $betaine
     */
    public function setBetaine(Nutrient $betaine): void
    {
        $this->betaine = $betaine;
    }

    /**
     * @return Nutrient
     */
    public function getCaffeine(): ?Nutrient
    {
        return $this->caffeine;
    }

    /**
     * @param Nutrient $caffeine
     */
    public function setCaffeine(Nutrient $caffeine): void
    {
        $this->caffeine = $caffeine;
    }

    /**
     * @return Nutrient
     */
    public function getCalcium(): ?Nutrient
    {
        return $this->calcium;
    }

    /**
     * @param Nutrient $calcium
     */
    public function setCalcium(Nutrient $calcium): void
    {
        $this->calcium = $calcium;
    }

    /**
     * @return Nutrient
     */
    public function getCampesterol(): ?Nutrient
    {
        return $this->campesterol;
    }

    /**
     * @param Nutrient $campesterol
     */
    public function setCampesterol(Nutrient $campesterol): void
    {
        $this->campesterol = $campesterol;
    }

    /**
     * @return Nutrient
     */
    public function getCarbohydrate(): ?Nutrient
    {
        return $this->carbohydrate;
    }

    /**
     * @param Nutrient $carbohydrate
     */
    public function setCarbohydrate(Nutrient $carbohydrate): void
    {
        $this->carbohydrate = $carbohydrate;
    }

    /**
     * @return Nutrient
     */
    public function getAlphaCarotene(): ?Nutrient
    {
        return $this->alphaCarotene;
    }

    /**
     * @param Nutrient $alphaCarotene
     */
    public function setAlphaCarotene(Nutrient $alphaCarotene): void
    {
        $this->alphaCarotene = $alphaCarotene;
    }

    /**
     * @return Nutrient
     */
    public function getBetaCarotene(): ?Nutrient
    {
        return $this->betaCarotene;
    }

    /**
     * @param Nutrient $betaCarotene
     */
    public function setBetaCarotene(Nutrient $betaCarotene): void
    {
        $this->betaCarotene = $betaCarotene;
    }

    /**
     * @return Nutrient
     */
    public function getCholesterol(): ?Nutrient
    {
        return $this->cholesterol;
    }

    /**
     * @param Nutrient $cholesterol
     */
    public function setCholesterol(Nutrient $cholesterol): void
    {
        $this->cholesterol = $cholesterol;
    }

    /**
     * @return Nutrient
     */
    public function getCholine(): ?Nutrient
    {
        return $this->choline;
    }

    /**
     * @param Nutrient $choline
     */
    public function setCholine(Nutrient $choline): void
    {
        $this->choline = $choline;
    }

    /**
     * @return Nutrient
     */
    public function getCopper(): ?Nutrient
    {
        return $this->copper;
    }

    /**
     * @param Nutrient $copper
     */
    public function setCopper(Nutrient $copper): void
    {
        $this->copper = $copper;
    }

    /**
     * @return Nutrient
     */
    public function getCryptoxanthin(): ?Nutrient
    {
        return $this->cryptoxanthin;
    }

    /**
     * @param Nutrient $cryptoxanthin
     */
    public function setCryptoxanthin(Nutrient $cryptoxanthin): void
    {
        $this->cryptoxanthin = $cryptoxanthin;
    }

    /**
     * @return Nutrient
     */
    public function getCystine(): ?Nutrient
    {
        return $this->cystine;
    }

    /**
     * @param Nutrient $cystine
     */
    public function setCystine(Nutrient $cystine): void
    {
        $this->cystine = $cystine;
    }

    /**
     * @return Nutrient
     */
    public function getMonounsaturatedFat(): ?Nutrient
    {
        return $this->monounsaturatedFat;
    }

    /**
     * @param Nutrient $monounsaturatedFat
     */
    public function setMonounsaturatedFat(Nutrient $monounsaturatedFat): void
    {
        $this->monounsaturatedFat = $monounsaturatedFat;
    }

    /**
     * @return Nutrient
     */
    public function getPolyunsaturatedFat(): ?Nutrient
    {
        return $this->polyunsaturatedFat;
    }

    /**
     * @param Nutrient $polyunsaturatedFat
     */
    public function setPolyunsaturatedFat(Nutrient $polyunsaturatedFat): void
    {
        $this->polyunsaturatedFat = $polyunsaturatedFat;
    }

    /**
     * @return Nutrient
     */
    public function getSaturatedFat(): ?Nutrient
    {
        return $this->saturatedFat;
    }

    /**
     * @param Nutrient $saturatedFat
     */
    public function setSaturatedFat(Nutrient $saturatedFat): void
    {
        $this->saturatedFat = $saturatedFat;
    }

    /**
     * @return Nutrient
     */
    public function getTransFat(): ?Nutrient
    {
        return $this->transFat;
    }

    /**
     * @param Nutrient $transFat
     */
    public function setTransFat(Nutrient $transFat): void
    {
        $this->transFat = $transFat;
    }

    /**
     * @return Nutrient
     */
    public function getFiber(): ?Nutrient
    {
        return $this->fiber;
    }

    /**
     * @param Nutrient $fiber
     */
    public function setFiber(Nutrient $fiber): void
    {
        $this->fiber = $fiber;
    }

    /**
     * @return Nutrient
     */
    public function getFluoride(): ?Nutrient
    {
        return $this->fluoride;
    }

    /**
     * @param Nutrient $fluoride
     */
    public function setFluoride(Nutrient $fluoride): void
    {
        $this->fluoride = $fluoride;
    }

    /**
     * @return Nutrient
     */
    public function getFolate(): ?Nutrient
    {
        return $this->folate;
    }

    /**
     * @param Nutrient $folate
     */
    public function setFolate(Nutrient $folate): void
    {
        $this->folate = $folate;
    }

    /**
     * @return Nutrient
     */
    public function getFolicAcid(): ?Nutrient
    {
        return $this->folicAcid;
    }

    /**
     * @param Nutrient $folicAcid
     */
    public function setFolicAcid(Nutrient $folicAcid): void
    {
        $this->folicAcid = $folicAcid;
    }

    /**
     * @return Nutrient
     */
    public function getFructose(): ?Nutrient
    {
        return $this->fructose;
    }

    /**
     * @param Nutrient $fructose
     */
    public function setFructose(Nutrient $fructose): void
    {
        $this->fructose = $fructose;
    }

    /**
     * @return Nutrient
     */
    public function getGalactose(): ?Nutrient
    {
        return $this->galactose;
    }

    /**
     * @param Nutrient $galactose
     */
    public function setGalactose(Nutrient $galactose): void
    {
        $this->galactose = $galactose;
    }

    /**
     * @return Nutrient
     */
    public function getGlucose(): ?Nutrient
    {
        return $this->glucose;
    }

    /**
     * @param Nutrient $glucose
     */
    public function setGlucose(Nutrient $glucose): void
    {
        $this->glucose = $glucose;
    }

    /**
     * @return Nutrient
     */
    public function getGlutamicAcid(): ?Nutrient
    {
        return $this->glutamicAcid;
    }

    /**
     * @param Nutrient $glutamicAcid
     */
    public function setGlutamicAcid(Nutrient $glutamicAcid): void
    {
        $this->glutamicAcid = $glutamicAcid;
    }

    /**
     * @return Nutrient
     */
    public function getGlycine(): ?Nutrient
    {
        return $this->glycine;
    }

    /**
     * @param Nutrient $glycine
     */
    public function setGlycine(Nutrient $glycine): void
    {
        $this->glycine = $glycine;
    }

    /**
     * @return Nutrient
     */
    public function getHistidine(): ?Nutrient
    {
        return $this->histidine;
    }

    /**
     * @param Nutrient $histidine
     */
    public function setHistidine(Nutrient $histidine): void
    {
        $this->histidine = $histidine;
    }

    /**
     * @return Nutrient
     */
    public function getHydroxyproline(): ?Nutrient
    {
        return $this->hydroxyproline;
    }

    /**
     * @param Nutrient $hydroxyproline
     */
    public function setHydroxyproline(Nutrient $hydroxyproline): void
    {
        $this->hydroxyproline = $hydroxyproline;
    }

    /**
     * @return Nutrient
     */
    public function getIron(): ?Nutrient
    {
        return $this->iron;
    }

    /**
     * @param Nutrient $iron
     */
    public function setIron(Nutrient $iron): void
    {
        $this->iron = $iron;
    }

    /**
     * @return Nutrient
     */
    public function getIsoleucine(): ?Nutrient
    {
        return $this->isoleucine;
    }

    /**
     * @param Nutrient $isoleucine
     */
    public function setIsoleucine(Nutrient $isoleucine): void
    {
        $this->isoleucine = $isoleucine;
    }

    /**
     * @return Nutrient
     */
    public function getLactose(): ?Nutrient
    {
        return $this->lactose;
    }

    /**
     * @param Nutrient $lactose
     */
    public function setLactose(Nutrient $lactose): void
    {
        $this->lactose = $lactose;
    }

    /**
     * @return Nutrient
     */
    public function getLeucine(): ?Nutrient
    {
        return $this->leucine;
    }

    /**
     * @param Nutrient $leucine
     */
    public function setLeucine(Nutrient $leucine): void
    {
        $this->leucine = $leucine;
    }

    /**
     * @return Nutrient
     */
    public function getLuteinPlusZeaxanthin(): ?Nutrient
    {
        return $this->luteinPlusZeaxanthin;
    }

    /**
     * @param Nutrient $luteinPlusZeaxanthin
     */
    public function setLuteinPlusZeaxanthin(Nutrient $luteinPlusZeaxanthin): void
    {
        $this->luteinPlusZeaxanthin = $luteinPlusZeaxanthin;
    }

    /**
     * @return Nutrient
     */
    public function getLycopene(): ?Nutrient
    {
        return $this->lycopene;
    }

    /**
     * @param Nutrient $lycopene
     */
    public function setLycopene(Nutrient $lycopene): void
    {
        $this->lycopene = $lycopene;
    }

    /**
     * @return Nutrient
     */
    public function getLysine(): ?Nutrient
    {
        return $this->lysine;
    }

    /**
     * @param Nutrient $lysine
     */
    public function setLysine(Nutrient $lysine): void
    {
        $this->lysine = $lysine;
    }

    /**
     * @return Nutrient
     */
    public function getMagnesium(): ?Nutrient
    {
        return $this->magnesium;
    }

    /**
     * @param Nutrient $magnesium
     */
    public function setMagnesium(Nutrient $magnesium): void
    {
        $this->magnesium = $magnesium;
    }

    /**
     * @return Nutrient
     */
    public function getMaltose(): ?Nutrient
    {
        return $this->maltose;
    }

    /**
     * @param Nutrient $maltose
     */
    public function setMaltose(Nutrient $maltose): void
    {
        $this->maltose = $maltose;
    }

    /**
     * @return Nutrient
     */
    public function getManganese(): ?Nutrient
    {
        return $this->manganese;
    }

    /**
     * @param Nutrient $manganese
     */
    public function setManganese(Nutrient $manganese): void
    {
        $this->manganese = $manganese;
    }

    /**
     * @return Nutrient
     */
    public function getMethionine(): ?Nutrient
    {
        return $this->methionine;
    }

    /**
     * @param Nutrient $methionine
     */
    public function setMethionine(Nutrient $methionine): void
    {
        $this->methionine = $methionine;
    }

    /**
     * @return Nutrient
     */
    public function getNiacin(): ?Nutrient
    {
        return $this->niacin;
    }

    /**
     * @param Nutrient $niacin
     */
    public function setNiacin(Nutrient $niacin): void
    {
        $this->niacin = $niacin;
    }

    /**
     * @return Nutrient
     */
    public function getPantothenicAcid(): ?Nutrient
    {
        return $this->pantothenicAcid;
    }

    /**
     * @param Nutrient $pantothenicAcid
     */
    public function setPantothenicAcid(Nutrient $pantothenicAcid): void
    {
        $this->pantothenicAcid = $pantothenicAcid;
    }

    /**
     * @return Nutrient
     */
    public function getPhenylalanine(): ?Nutrient
    {
        return $this->phenylalanine;
    }

    /**
     * @param Nutrient $phenylalanine
     */
    public function setPhenylalanine(Nutrient $phenylalanine): void
    {
        $this->phenylalanine = $phenylalanine;
    }

    /**
     * @return Nutrient
     */
    public function getPhosphorus(): ?Nutrient
    {
        return $this->phosphorus;
    }

    /**
     * @param Nutrient $phosphorus
     */
    public function setPhosphorus(Nutrient $phosphorus): void
    {
        $this->phosphorus = $phosphorus;
    }

    /**
     * @return Nutrient
     */
    public function getPhytosterols(): ?Nutrient
    {
        return $this->phytosterols;
    }

    /**
     * @param Nutrient $phytosterols
     */
    public function setPhytosterols(Nutrient $phytosterols): void
    {
        $this->phytosterols = $phytosterols;
    }

    /**
     * @return Nutrient
     */
    public function getPotassium(): ?Nutrient
    {
        return $this->potassium;
    }

    /**
     * @param Nutrient $potassium
     */
    public function setPotassium(Nutrient $potassium): void
    {
        $this->potassium = $potassium;
    }

    /**
     * @return Nutrient
     */
    public function getProline(): ?Nutrient
    {
        return $this->proline;
    }

    /**
     * @param Nutrient $proline
     */
    public function setProline(Nutrient $proline): void
    {
        $this->proline = $proline;
    }

    /**
     * @return Nutrient
     */
    public function getRetinol(): ?Nutrient
    {
        return $this->retinol;
    }

    /**
     * @param Nutrient $retinol
     */
    public function setRetinol(Nutrient $retinol): void
    {
        $this->retinol = $retinol;
    }

    /**
     * @return Nutrient
     */
    public function getRiboflavin(): ?Nutrient
    {
        return $this->riboflavin;
    }

    /**
     * @param Nutrient $riboflavin
     */
    public function setRiboflavin(Nutrient $riboflavin): void
    {
        $this->riboflavin = $riboflavin;
    }

    /**
     * @return Nutrient
     */
    public function getSelenium(): ?Nutrient
    {
        return $this->selenium;
    }

    /**
     * @param Nutrient $selenium
     */
    public function setSelenium(Nutrient $selenium): void
    {
        $this->selenium = $selenium;
    }

    /**
     * @return Nutrient
     */
    public function getSerine(): ?Nutrient
    {
        return $this->serine;
    }

    /**
     * @param Nutrient $serine
     */
    public function setSerine(Nutrient $serine): void
    {
        $this->serine = $serine;
    }

    /**
     * @return Nutrient
     */
    public function getSodium(): ?Nutrient
    {
        return $this->sodium;
    }

    /**
     * @param Nutrient $sodium
     */
    public function setSodium(Nutrient $sodium): void
    {
        $this->sodium = $sodium;
    }

    /**
     * @return Nutrient
     */
    public function getStarch(): ?Nutrient
    {
        return $this->starch;
    }

    /**
     * @param Nutrient $starch
     */
    public function setStarch(Nutrient $starch): void
    {
        $this->starch = $starch;
    }

    /**
     * @return Nutrient
     */
    public function getStigmasterol(): ?Nutrient
    {
        return $this->stigmasterol;
    }

    /**
     * @param Nutrient $stigmasterol
     */
    public function setStigmasterol(Nutrient $stigmasterol): void
    {
        $this->stigmasterol = $stigmasterol;
    }

    /**
     * @return Nutrient
     */
    public function getSucrose(): ?Nutrient
    {
        return $this->sucrose;
    }

    /**
     * @param Nutrient $sucrose
     */
    public function setSucrose(Nutrient $sucrose): void
    {
        $this->sucrose = $sucrose;
    }

    /**
     * @return Nutrient
     */
    public function getSugars(): ?Nutrient
    {
        return $this->sugars;
    }

    /**
     * @param Nutrient $sugars
     */
    public function setSugars(Nutrient $sugars): void
    {
        $this->sugars = $sugars;
    }

    /**
     * @return Nutrient
     */
    public function getTheobromine(): ?Nutrient
    {
        return $this->theobromine;
    }

    /**
     * @param Nutrient $theobromine
     */
    public function setTheobromine(Nutrient $theobromine): void
    {
        $this->theobromine = $theobromine;
    }

    /**
     * @return Nutrient
     */
    public function getThiamin(): ?Nutrient
    {
        return $this->thiamin;
    }

    /**
     * @param Nutrient $thiamin
     */
    public function setThiamin(Nutrient $thiamin): void
    {
        $this->thiamin = $thiamin;
    }

    /**
     * @return Nutrient
     */
    public function getThreonine(): ?Nutrient
    {
        return $this->threonine;
    }

    /**
     * @param Nutrient $threonine
     */
    public function setThreonine(Nutrient $threonine): void
    {
        $this->threonine = $threonine;
    }

    /**
     * @return Nutrient
     */
    public function getBetaTocopherol(): ?Nutrient
    {
        return $this->betaTocopherol;
    }

    /**
     * @param Nutrient $betaTocopherol
     */
    public function setBetaTocopherol(Nutrient $betaTocopherol): void
    {
        $this->betaTocopherol = $betaTocopherol;
    }

    /**
     * @return Nutrient
     */
    public function getDeltaTocopherol(): ?Nutrient
    {
        return $this->deltaTocopherol;
    }

    /**
     * @param Nutrient $deltaTocopherol
     */
    public function setDeltaTocopherol(Nutrient $deltaTocopherol): void
    {
        $this->deltaTocopherol = $deltaTocopherol;
    }

    /**
     * @return Nutrient
     */
    public function getGammaTocopherol(): ?Nutrient
    {
        return $this->gammaTocopherol;
    }

    /**
     * @param Nutrient $gammaTocopherol
     */
    public function setGammaTocopherol(Nutrient $gammaTocopherol): void
    {
        $this->gammaTocopherol = $gammaTocopherol;
    }

    /**
     * @return Nutrient
     */
    public function getAlphaTocotrienol(): ?Nutrient
    {
        return $this->alphaTocotrienol;
    }

    /**
     * @param Nutrient $alphaTocotrienol
     */
    public function setAlphaTocotrienol(Nutrient $alphaTocotrienol): void
    {
        $this->alphaTocotrienol = $alphaTocotrienol;
    }

    /**
     * @return Nutrient
     */
    public function getBetaTocotrienol(): ?Nutrient
    {
        return $this->betaTocotrienol;
    }

    /**
     * @param Nutrient $betaTocotrienol
     */
    public function setBetaTocotrienol(Nutrient $betaTocotrienol): void
    {
        $this->betaTocotrienol = $betaTocotrienol;
    }

    /**
     * @return Nutrient
     */
    public function getDeltaTocotrienol(): ?Nutrient
    {
        return $this->deltaTocotrienol;
    }

    /**
     * @param Nutrient $deltaTocotrienol
     */
    public function setDeltaTocotrienol(Nutrient $deltaTocotrienol): void
    {
        $this->deltaTocotrienol = $deltaTocotrienol;
    }

    /**
     * @return Nutrient
     */
    public function getGammaTocotrienol(): ?Nutrient
    {
        return $this->gammaTocotrienol;
    }

    /**
     * @param Nutrient $gammaTocotrienol
     */
    public function setGammaTocotrienol(Nutrient $gammaTocotrienol): void
    {
        $this->gammaTocotrienol = $gammaTocotrienol;
    }

    /**
     * @return Nutrient
     */
    public function getFat(): ?Nutrient
    {
        return $this->fat;
    }

    /**
     * @param Nutrient $fat
     */
    public function setFat(Nutrient $fat): void
    {
        $this->fat = $fat;
    }

    /**
     * @return Nutrient
     */
    public function getTryptophan(): ?Nutrient
    {
        return $this->tryptophan;
    }

    /**
     * @param Nutrient $tryptophan
     */
    public function setTryptophan(Nutrient $tryptophan): void
    {
        $this->tryptophan = $tryptophan;
    }

    /**
     * @return Nutrient
     */
    public function getTyrosine(): ?Nutrient
    {
        return $this->tyrosine;
    }

    /**
     * @param Nutrient $tyrosine
     */
    public function setTyrosine(Nutrient $tyrosine): void
    {
        $this->tyrosine = $tyrosine;
    }

    /**
     * @return Nutrient
     */
    public function getValine(): ?Nutrient
    {
        return $this->valine;
    }

    /**
     * @param Nutrient $valine
     */
    public function setValine(Nutrient $valine): void
    {
        $this->valine = $valine;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminA(): ?Nutrient
    {
        return $this->vitaminA;
    }

    /**
     * @param Nutrient $vitaminA
     */
    public function setVitaminA(Nutrient $vitaminA): void
    {
        $this->vitaminA = $vitaminA;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminB12(): ?Nutrient
    {
        return $this->vitaminB12;
    }

    /**
     * @param Nutrient $vitaminB12
     */
    public function setVitaminB12(Nutrient $vitaminB12): void
    {
        $this->vitaminB12 = $vitaminB12;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminB6(): ?Nutrient
    {
        return $this->vitaminB6;
    }

    /**
     * @param Nutrient $vitaminB6
     */
    public function setVitaminB6(Nutrient $vitaminB6): void
    {
        $this->vitaminB6 = $vitaminB6;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminC(): ?Nutrient
    {
        return $this->vitaminC;
    }

    /**
     * @param Nutrient $vitaminC
     */
    public function setVitaminC(Nutrient $vitaminC): void
    {
        $this->vitaminC = $vitaminC;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminD(): ?Nutrient
    {
        return $this->vitaminD;
    }

    /**
     * @param Nutrient $vitaminD
     */
    public function setVitaminD(Nutrient $vitaminD): void
    {
        $this->vitaminD = $vitaminD;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminD2(): ?Nutrient
    {
        return $this->vitaminD2;
    }

    /**
     * @param Nutrient $vitaminD2
     */
    public function setVitaminD2(Nutrient $vitaminD2): void
    {
        $this->vitaminD2 = $vitaminD2;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminD3(): ?Nutrient
    {
        return $this->vitaminD3;
    }

    /**
     * @param Nutrient $vitaminD3
     */
    public function setVitaminD3(Nutrient $vitaminD3): void
    {
        $this->vitaminD3 = $vitaminD3;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminE(): ?Nutrient
    {
        return $this->vitaminE;
    }

    /**
     * @param Nutrient $vitaminE
     */
    public function setVitaminE(Nutrient $vitaminE): void
    {
        $this->vitaminE = $vitaminE;
    }

    /**
     * @return Nutrient
     */
    public function getVitaminK(): ?Nutrient
    {
        return $this->vitaminK;
    }

    /**
     * @param Nutrient $vitaminK
     */
    public function setVitaminK(Nutrient $vitaminK): void
    {
        $this->vitaminK = $vitaminK;
    }

    /**
     * @return Nutrient
     */
    public function getZinc(): ?Nutrient
    {
        return $this->zinc;
    }

    /**
     * @param Nutrient $zinc
     */
    public function setZinc(Nutrient $zinc): void
    {
        $this->zinc = $zinc;
    }
}
